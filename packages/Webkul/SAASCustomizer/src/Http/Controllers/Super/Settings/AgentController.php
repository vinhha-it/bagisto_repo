<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Models\SuperRoles;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Http\Requests\AgentForm;
use Webkul\SAASCustomizer\DataGrids\Settings\AgentDataGrid;
use Webkul\SAASCustomizer\Repositories\Super\AgentRepository;
use Webkul\SAASCustomizer\Repositories\Super\RoleRepository;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\AgentRepository  $agentRepository
     * @param  \Webkul\SAASCustomizer\Repositories\RoleRepository  $roleRepository
     * @return void
     */
    public function __construct(
        protected AgentRepository $agentRepository,
        protected RoleRepository $roleRepository
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(AgentDataGrid::class)->process();
        }

        $roles = $this->roleRepository->all();

        return view('saas::super.settings.agents.index', compact('roles'));
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentForm $request): JsonResponse
    {
        $data = $request->only([
            'first_name',
            'last_name',
            'email',
            'password',
            'password_confirmation',
            'role_id',
            'status'
        ]);

        if ($data['password'] ?? null) {
            $data['password'] = bcrypt($data['password']);

            $data['api_token'] = Str::random(80);
        }

        Event::dispatch('super.settings.agent.create.before');

        $agent = $this->agentRepository->create($data);

        if (request()->hasFile('image')) {
            $agent->image = current(request()->file('image'))->store('super-admins/'.$agent->id);

            $agent->save();
        }

        Event::dispatch('super.settings.agent.create.after', $agent);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.agents.create-success'),
        ]);
    }

    /**
     * Agent Details
     */
    public function edit(int $id): JsonResponse
    {
        $agent = $this->agentRepository->findOrFail($id);

        $roles = $this->roleRepository->all();

        return new JsonResponse([
            'roles' => $roles,
            'agent' => $agent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentForm $request): JsonResponse
    {
        $id = request()->id;

        $data = $this->prepareUserData($request, $id);

        if ($data instanceof \Illuminate\Http\RedirectResponse) {
            return $data;
        }
        
        Event::dispatch('super.settings.agent.update.before', $id);

        $agent = $this->agentRepository->update($data, $id);

        if (request()->hasFile('image')) {
            $agent->image = current(request()->file('image'))->store('super-admins/'.$agent->id);
        } else {
            
            $imageUrl = request()->input('image');

            if (
                ! request()->has('image.image')
                && ! empty($agent->image)
                && ! isset($imageUrl['image_url'])
            ) {
                Storage::delete($agent->image);
                
                $agent->image = null;
            }
        }

        $agent->save();

        if (! empty($data['password'])) {
            Event::dispatch('super.settings.agent.password.update.after', $agent);
        }

        Event::dispatch('super.settings.agent.update.after', $agent);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.agents.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        if ($this->agentRepository->count() == 1) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.agents.last-delete-error'),
            ], 400);
        }

        try {
            Event::dispatch('super.settings.agent.delete.before', $id);

            $this->agentRepository->delete($id);

            Event::dispatch('super.settings.agent.delete.after', $id);

            return new JsonResponse([
                'message' => trans('saas::app.super.settings.agents.delete-success'),
            ], 200);
        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.agents.delete-failed'),
        ], 500);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        if ($this->agentRepository->count() == 1) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.agents.last-delete-error'),
            ], 400);
        }

        $roleIds = $this->roleRepository->findByField('permission_type', SuperRoles::PERMISSION_ALL)
                    ->pluck('id')
                    ->toArray();

        $suppressFlash = true;

        $agentIds = $massDestroyRequest->input('indices');

        foreach ($agentIds as $agentId) {
            $agent = $this->agentRepository->find($agentId);

            if ($agent) {
                if (auth()->guard('super-admin')->user()->id === (int) $agentId) {
                    $suppressFlash = false;

                    return new JsonResponse(['message' => trans('saas::app.super.settings.agents.login-delete-error')], 400);
                }

                if (! $this->checkAdministrativeAgent($agentId, $roleIds)) {
                    $suppressFlash = false;

                    return new JsonResponse(['message' => trans('saas::app.super.settings.agents.administrator-delete-error')], 400);
                }

                try {
                    $suppressFlash = true;

                    Event::dispatch('super.settings.agent.delete.before', $agentId);
        
                    $this->agentRepository->delete($agentId);
        
                    Event::dispatch('super.settings.agent.delete.after', $agentId);
                } catch (\Exception $e) {
                    return new JsonResponse([
                        'message' => trans('saas::app.super.settings.agents.delete-failed'),
                    ], 500);
                }
            }
        }

        if ($suppressFlash) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.agents.delete-success'),
            ], 200);
        }

        return redirect()->route('super.settings.agents.index');
    }

    /**
     * Check whether the current agent is deletable or not.
     *
     * This method will check for another agent having administrative 
     * access except current one.
     *
     * @param  int  $agentId
     * @param  array  $roleIds
     * @return bool
     */
    private function checkAdministrativeAgent($agentId, $roleIds)
    {
        return $this->agentRepository->whereIn('role_id', $roleIds)
                ->whereNotIn('id', [$agentId])
                ->first() ? true : false;
    }

    /**
     * Show the form for confirming the agent password.
     *
     * @return \Illuminate\View\View
     */
    public function confirm(int $id)
    {
        $agent = $this->agentRepository->findOrFail($id);

        return view($this->_config['view'], compact('agent'));
    }

    /**
     * destroy current after confirming
     *
     * @return mixed
     */
    public function destroySelf()
    {
        $password = request()->input('password');

        if (! Hash::check($password, auth()->guard('super-admin')->user()->password)) {
            session()->flash('warning', trans('saas::app.super.settings.agents.incorrect-password'));

            return redirect()->route($this->_config['redirect']);
        }

        if ($this->agentRepository->count() == 1) {
            session()->flash('error', trans('saas::app.super.settings.agents.last-delete-error'));

            return redirect()->route($this->_config['redirect']);
        }
            
        $id = auth()->guard('super-admin')->user()->id;

        Event::dispatch('super.agent.delete.before', $id);

        $this->agentRepository->delete($id);

        auth()->guard('super-admin')->logout();

        Event::dispatch('super.agent.delete.after', $id);

        session()->flash('success', trans('saas::app.super.settings.agents.delete-success'));

        return redirect()->route('super.session.create');
    }

    /**
     * Prepare user data.
     *
     * @param AgentForm $request
     * @param  int  $id
     * @return array|\Illuminate\Http\RedirectResponse
     */
    private function prepareUserData(AgentForm $request, $id)
    {
        $data = $request->validated();

        $agent = $this->agentRepository->find($id);

        /**
         * Password check.
         */
        if (! $data['password']) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }
        
        /**
         * Is user with `permission_type` all changed status.
         */
        $data['status'] = isset($data['status']);

        $isStatusChangedToInactive = ! $data['status'] && (bool) $agent->status;

        if (
            $isStatusChangedToInactive 
            && $agent->role->permission_type === 'all' 
            && (auth()->guard('super-admin')->user()->id === (int) $id
                || $this->agentRepository->countAdminsWithAllAccessAndActiveStatus() === 1
            )
        ) {
            return $this->cannotChangeRedirectResponse('status');
        }

        /**
         * Is agent with `permission_type` all role changed.
         */
        $isRoleChanged = $agent->role->permission_type === 'all'
            && isset($data['role_id'])
            && (int) $data['role_id'] !== $agent->role_id;

        if (
            $isRoleChanged
            && $this->agentRepository->countAdminsWithAllAccess() === 1
        ) {
            return $this->cannotChangeRedirectResponse('role');
        }

        return $data;
    }

    /**
     * Cannot change redirect response.
     */
    private function cannotChangeRedirectResponse(string $columnName): \Illuminate\Http\RedirectResponse
    {
        session()->flash('error', trans('saas::app.super.settings.agents.cannot-change', [
            'name' => $columnName,
        ]));

        return redirect()->route('super.settings.agents.index');
    }
}
