<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Settings\CurrencyDataGrid;
use Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository;

class CurrencyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository  $currencyRepository
     * @return void
     */
    public function __construct(protected CurrencyRepository $currencyRepository)
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
            return datagrid(CurrencyDataGrid::class)->process();
        }

        return view('saas::super.settings.currencies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas::super.settings.currencies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): JsonResponse
    {
        $this->validate(request(), [
            'code' => 'required|min:3|max:3|unique:super_currencies,code',
            'name' => 'required',
        ]);

        $data = request()->only([
            'code',
            'name',
            'symbol',
            'decimal'
        ]);

        Event::dispatch('super.settings.currency.create.before');

        $currency = $this->currencyRepository->create($data);

        Event::dispatch('super.settings.currency.create.after', $currency);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.currencies.create-success'),
        ]);
    }

    /**
     * Currency Details
     */
    public function edit(int $id): JsonResponse
    {
        $currency = $this->currencyRepository->findOrFail($id);

        return new JsonResponse($currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(): JsonResponse
    {
        $id = request()->id;

        $this->validate(request(), [
            'code' => ['required', 'unique:super_currencies,code,'.$id, new \Webkul\Core\Rules\Code],
            'name' => 'required',
        ]);

        $data = request()->only([
            'code',
            'name',
            'symbol',
            'decimal'
        ]);

        Event::dispatch('super.settings.currency.update.before', $id);

        $currency = $this->currencyRepository->update($data, $id);

        Event::dispatch('super.settings.currency.update.after', $currency);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.currencies.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->currencyRepository->findOrFail($id);

        if ($this->currencyRepository->count() == 1) {
            return response()->json([
                'message' => trans('saas::app.super.settings.currencies.last-delete-error')
            ], 400);
        }

        try {
            Event::dispatch('super.settings.currency.delete.before', $id);

            $this->currencyRepository->delete($id);

            Event::dispatch('super.settings.currency.delete.after', $id);

            return response()->json([
                'message' => trans('saas::app.super.settings.currencies.delete-success'),
            ], 200);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json([
            'message' => trans('saas::app.super.settings.currencies.delete-failed')
        ], 500);
    }

    /**
     * Mass delete the products.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $currenciesIds = $massDestroyRequest->input('indices');

        $channelCurrencyIds = company()->getCurrentChannel()->currencies->pluck('id')->toArray();

        try {
            foreach ($currenciesIds as $currencyId) {
                $currency = $this->currencyRepository->find($currencyId);

                if (in_array($currency->id, $channelCurrencyIds)) {
                    return response()->json([
                        'message' => trans('saas::app.super.settings.currencies.last-delete-error')
                    ], 400);
                }
    
                if (isset($currency)) {
                    Event::dispatch('super.settings.currency.delete.before', $currencyId);
    
                    $this->currencyRepository->delete($currencyId);
    
                    Event::dispatch('super.settings.currency.delete.after', $currencyId);
                }
            }

            return new JsonResponse([
                'message' => trans('saas::app.super.settings.currencies.mass-delete-success')
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'message' => $e->getMessage()
            ], 500);
        }
    }
}