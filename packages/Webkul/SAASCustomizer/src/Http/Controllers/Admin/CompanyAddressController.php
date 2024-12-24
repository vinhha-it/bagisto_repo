<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Admin\CompanyAddressDataGrid;
use Webkul\SAASCustomizer\Repositories\CompanyAddressRepository;

class CompanyAddressController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\CompanyAddressRepository $companyAddressRepository
     * @return void
     */
    public function __construct(protected CompanyAddressRepository $companyAddressRepository)
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
            return datagrid(CompanyAddressDataGrid::class)->process();
        }

        return view('saas::admin.address.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas::admin.address.create', ['defaultCountry' => config('app.default_country')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'address1'  => 'required|string|max:160',
            'address2'  => 'nullable|string|max:160',
            'country'   => 'required|string',
            'state'     => 'required|string',
            'zip_code'  => 'required|string',
            'phone'     => 'required|string'
        ]);

        $data = request()->only([
            'address1',
            'address2',
            'country',
            'state',
            'city',
            'zip_code',
            'phone',
        ]);

        if ($this->companyAddressRepository->create($data)) {
            session()->flash('success', trans('saas::app.admin.tenant-address.create-success'));
        } else {
            session()->flash('error', trans('saas::app.admin.tenant-address.create-failed', [
                'attribute' => 'address'
            ]));
        }

        return redirect()->route('admin.company.address.index');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $address = $this->companyAddressRepository->findOrFail($id);

        $defaultCountry = config('app.default_country');

        return view('saas::admin.address.edit')->with(compact('address', 'defaultCountry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $this->validate(request(), [
            'address1'  => 'required|string|max:160',
            'address2'  => 'nullable|string|max:160',
            'country'   => 'required|string',
            'state'     => 'required|string',
            'zip_code'  => 'required|string',
            'phone'     => 'required|string'
        ]);

        $data = request()->only([
            'address1',
            'address2',
            'country',
            'state',
            'city',
            'zip_code',
            'phone',
        ]);

        $address = $this->companyAddressRepository->findOrFail($id);
        
        if ($address->update($data)) {
            session()->flash('success', trans('saas::app.admin.tenant-address.update-success'));
        } else {
            session()->flash('error', trans('saas::app.admin.tenant-address.update-failed'));
        }

        return redirect()->route('admin.company.address.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    protected function destroy(int $id): JsonResponse
    {
        $address = $this->companyAddressRepository->findOrFail($id);

        try {

            Event::dispatch('admin.company.address.delete.before', $id);

            $this->companyAddressRepository->delete($id);

            Event::dispatch('admin.company.address.delete.after', $id);

            return new JsonResponse([
                'message' => trans('saas::app.admin.tenant-address.delete-success', ['resource' => 'Company address'])
            ]);
        } catch (\Exception $e) {
        }

        return new JsonResponse([
            'message' => trans('saas::app.admin.tenant-address.delete-failed', ['resource' => 'Company address'])], 500);
    }

    /**
     * To mass delete resource from storage.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $addressIds = $massDestroyRequest->input('indices');

        try {
            foreach ($addressIds as $addressId) {
                $companyAddress = $this->companyAddressRepository->find($addressId);
    
                if (isset($companyAddress)) {
                    Event::dispatch('admin.company.address.delete.before', $addressId);
    
                    $this->companyAddressRepository->delete($addressId);
    
                    Event::dispatch('super.company.address.delete.after', $addressId);
                }
            }

            return new JsonResponse([
                'message' => trans('saas::app.admin.tenant-address.mass-delete-success')
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}