<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Agent;

use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Hash;
use Webkul\SAASCustomizer\Http\Controllers\Controller;

class AccountController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit()
    {
        $superAdmin = auth()->guard('super-admin')->user();

        return view('saas::super.agents.account.edit', compact('superAdmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $superAdmin = auth()->guard('super-admin')->user();

        $this->validate(request(), [
            'first_name'       => 'required',
            'last_name'        => 'required',
            'email'            => 'required|email|unique:super_admins,email,'.$superAdmin->id,
            'password'         => 'nullable|min:6|confirmed',
            'current_password' => 'required|min:6',
        ]);

        $data = request()->only([
            'first_name',
            'last_name',
            'email',
            'password',
            'password_confirmation',
            'current_password',
        ]);

        if (! Hash::check($data['current_password'], $superAdmin->password)) {
            session()->flash('warning', trans('saas::app.super.settings.agents.invalid-password'));

            return redirect()->back();
        }

        $isPasswordChanged = false;

        if (! $data['password']) {
            unset($data['password']);
        } else {
            $isPasswordChanged = true;

            $data['password'] = bcrypt($data['password']);
        }

        Event::dispatch('super.settings.agent.update.before', $superAdmin->id);

        $superAdmin->update($data);

        if (request()->hasFile('image')) {
            $superAdmin->image = current(request()->file('image'))->store('super-admins/'.$superAdmin->id);
        } else {
            if (! request()->has('image.image')) {
                if (! empty(request()->input('image.image'))) {
                    Storage::delete($superAdmin->image);
                }

                $superAdmin->image = null;
            }
        }

        $superAdmin->save();

        if ($isPasswordChanged) {
            Event::dispatch('super.settings.agent.update.after', $superAdmin);
        }

        session()->flash('success', trans('saas::app.super.settings.agents.update-success'));
        
        return back();
    }
}