<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Settings\RoleDataGrid;
use Webkul\SAASCustomizer\Repositories\Super\AgentRepository;
use Webkul\SAASCustomizer\Repositories\Super\RoleRepository;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Super\AgentRepository  $agentRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\RoleRepository  $roleRepository
     * @return void
     */
    public function __construct(
        protected AgentRepository $agentRepository,
        protected RoleRepository $roleRepository,
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
            return datagrid(RoleDataGrid::class)->process();
        }

        return view('saas::super.settings.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas::super.settings.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'            => 'required',
            'description'     => 'required',
            'permission_type' => 'required',
        ]);

        Event::dispatch('super.settings.role.create.before');

        $data = request()->only([
            "name",
            "description",
            "permission_type",
            "permissions"
        ]);

        $role = $this->roleRepository->create($data);

        Event::dispatch('super.settings.role.create.after', $role);

        session()->flash('success', trans('saas::app.super.settings.roles.create-success'));

        return redirect()->route('super.settings.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $role = $this->roleRepository->findOrFail($id);

        return view('saas::super.settings.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $this->validate(request(), [
            'name'            => 'required',
            'description'     => 'required',
            'permission_type' => 'required',
        ]);

        /**
         * Check for other agents if the role has been changed from all to custom.
         */
        $isChangedFromAll = request('permission_type') == 'custom' && $this->roleRepository->find($id)->permission_type == 'all';

        if (
            $isChangedFromAll
            && $this->agentRepository->countAdminsWithAllAccess() === 1
        ) {
            session()->flash('error', trans('saas::app.super.settings.roles.being-used'));

            return redirect()->route('super.settings.roles.index');
        }

        $data = array_merge(request()->only([
            "name",
            "description",
            "permission_type",
        ]), [
            'permissions' => request()->has('permissions') ? request('permissions') : [],
        ]);

        Event::dispatch('super.settings.role.update.before', $id);

        $role = $this->roleRepository->update($data, $id);

        Event::dispatch('super.settings.role.update.after', $role);

        session()->flash('success', trans('saas::app.super.settings.roles.update-success'));

        return redirect()->route('super.settings.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $role = $this->roleRepository->findOrFail($id);

        if ($role->agents->count() >= 1) {
            return new JsonResponse(['message' => trans('saas::app.super.settings.roles.being-used', [
                'name'   => 'saas::app.super.settings.roles.index.title',
                'source' => 'saas::app.super.settings.roles.index.admin-user'
            ])], 400);
        }

        if ($this->roleRepository->count() == 1) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.roles.last-delete-error')
            ], 400);
        }

        try {
            Event::dispatch('super.settings.role.delete.before', $id);

            $this->roleRepository->delete($id);

            Event::dispatch('super.settings.role.delete.after', $id);

            return new JsonResponse(['message' => trans('saas::app.super.settings.roles.delete-success')]);
        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.roles.delete-failed')
        ], 500);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        if ($this->roleRepository->count() == 1) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.roles.last-delete-error')
            ], 400);
        }

        $suppressFlash = true;

        $roleIds = $massDestroyRequest->input('indices');

        foreach ($roleIds as $roleId) {
            $role = $this->roleRepository->find($roleId);

            if ($role->agents->count()) {
                return new JsonResponse(['message' => trans('saas::app.super.settings.roles.being-used', [
                    'name'   => 'saas::app.super.settings.roles.index.title',
                    'source' => 'saas::app.super.settings.roles.index.admin-user'
                ])], 400);
            }

            try {
                $suppressFlash = true;

                Event::dispatch('super.settings.role.delete.before', $roleId);

                $this->roleRepository->delete($roleId);

                Event::dispatch('super.settings.role.delete.after', $roleId);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'message' => trans('saas::app.super.settings.roles.delete-failed'),
                ], 500);
            }
        }

        if ($suppressFlash) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.roles.delete-success'),
            ], 200);
        }

        return redirect()->route('super.settings.roles.index');
    }
}
