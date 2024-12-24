<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Tenant;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassUpdateRequest;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\Product\Repositories\ProductRepository;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Http\Requests\CompanyRequest;
use Webkul\SAASCustomizer\DataGrids\Tenant\TenantDataGrid;
use Webkul\SAASCustomizer\Repositories\Super\CompanyRepository;

class TenantController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Product\Repositories\ProductRepository  $productRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CompanyRepository  $companyRepository
     * @return void
     */
    public function __construct(
        protected ProductRepository $productRepository,
        protected CompanyRepository $companyRepository,
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(TenantDataGrid::class)->process();
        }

        return view('saas::super.tenants.companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas::super.tenants.companies.create');
    }

    /**
     * Validate request data.
     */
    public function validateTenant(CompanyRequest $companyRequest): JsonResponse
    {
        return new JsonResponse([
            'success' => true,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $company = $this->companyRepository->findOrFail($id);

        return view('saas::super.tenants.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Webkul\SAASCustomizer\Http\Requests\CompanyRequest  $companyRequest
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $companyRequest, $id)
    {
        Event::dispatch('saas.company.update.before', $id);

        $data = array_merge($companyRequest->all(), [
                    'is_active' => $companyRequest->input('is_active') ?: NULL,
                    'cname'     => $companyRequest->input('cname') ?: NULL,
                ]);

        $company = $this->companyRepository->update($data, $id);

        if ($channel = $company->channels->first()) {
            $channel->update(['hostname' => strtolower($company->domain)]);
        }

        Event::dispatch('saas.company.update.after', $company);

        session()->flash('success', trans('saas::app.super.tenants.update-success'));

        return redirect()->route('super.tenants.companies.index');
    }

    /**
     * Show the view for the specified resource.
     * 
     * @return \Illuminate\View\View
     */
    public function view(int $id)
    {
        $company = $this->companyRepository->findOrFail($id);

        $aggregates = $this->companyRepository->getAggregates($id);

        return view('saas::super.tenants.companies.view', compact('company', 'aggregates'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $company = $this->companyRepository->findOrFail($id);

        try {
            Event::dispatch('saas.company.delete.before', $id);

            $this->productRepository->deleteWhere(['company_id' => $id]);

            $this->companyRepository->delete($id);

            Event::dispatch('saas.company.delete.after', $id);

            return new JsonResponse([
                'message' => trans('saas::app.super.tenants.delete-success')
            ]);
        } catch(\Exception $e) {}

        return new JsonResponse([
            'message' => trans('saas::app.super.tenants.delete-failed')
        ], 500);
    }

    /**
     * Update the specified resources to database.
     * 
     */
    public function massUpdate(MassUpdateRequest $massUpdateRequest): JsonResponse
    {
        $indices = $massUpdateRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('saas.company.update.before', $index);

            $company = $this->companyRepository->update([
                'is_active' => $massUpdateRequest->input('value'),
            ], $index);

            Event::dispatch('saas.company.update.after', $company);
        }

        return new JsonResponse([
            'message' => trans('saas::app.super.tenants.update-success'),
        ]);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('saas.company.delete.before', $index);

            $this->productRepository->deleteWhere(['company_id' => $index]);

            $this->companyRepository->delete($index);

            Event::dispatch('saas.company.delete.after', $index);
        }

        return new JsonResponse([
            'message' => trans('saas::app.super.tenants.index.datagrid.mass-delete-success')
        ]);
    }
}
