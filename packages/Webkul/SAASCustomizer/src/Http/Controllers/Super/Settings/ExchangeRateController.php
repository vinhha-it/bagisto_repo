<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\DataGrids\Settings\ExchangeRateDataGrid;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Repositories\Super\ExchangeRateRepository;
use Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository;

class ExchangeRateController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Super\ExchangeRateRepository  $exchangeRateRepository
     * @param  \Webkul\SAASCustomizer\Repositories\Super\CurrencyRepository  $currencyRepository
     * @return void
     */
    public function __construct(
        protected ExchangeRateRepository $exchangeRateRepository,
        protected CurrencyRepository $currencyRepository
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
            return datagrid(ExchangeRateDataGrid::class)->process();
        }

        $currencies = $this->currencyRepository->with('exchange_rate')->all();

        return view('saas::super.settings.exchange-rates.index', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): JsonResponse
    {
        $this->validate(request(), [
            'target_currency' => ['required', 'unique:super_currency_exchange_rates,target_currency'],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('super.settings.exchange_rate.create.before');

        $exchangeRate = $this->exchangeRateRepository->create(request()->only([
            'target_currency',
            'rate'
        ]));

        Event::dispatch('super.settings.exchange_rate.create.after', $exchangeRate);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.exchange-rates.create-success'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        $currencies = $this->currencyRepository->all();

        $exchangeRate = $this->exchangeRateRepository->findOrFail($id);

        return new JsonResponse([
            'data' => [
                'currencies' => $currencies,
                'exchangeRate' => $exchangeRate,
            ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(): JsonResponse
    {
        $this->validate(request(), [
            'target_currency' => ['required', 'unique:super_currency_exchange_rates,target_currency,'.request()->id],
            'rate'            => 'required|numeric',
        ]);

        Event::dispatch('super.settings.exchange_rate.update.before', request()->id);

        $exchangeRate = $this->exchangeRateRepository->update(request()->only([
            'target_currency',
            'rate'
        ]), request()->id);

        Event::dispatch('super.settings.exchange_rate.update.after', $exchangeRate);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.exchange-rates.update-success'),
        ]);
    }

    /**
     * Update Rates Using Exchange Rates API
     */
    public function updateRates():JsonResponse 
    {
        try {
            app(config('services.exchange_api.'.config('services.exchange_api.default').'.class'))->updateRates();

            session()->flash('success', trans('saas::app.super.settings.exchange-rates.update-success'));
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $this->exchangeRateRepository->findOrFail($id);

        try {
            Event::dispatch('super.settings.exchange_rate.delete.before', $id);

            $this->exchangeRateRepository->delete($id);

            Event::dispatch('super.settings.exchange_rate.delete.after', $id);

            return response()->json([
                'message' => trans('saas::app.super.settings.exchange-rates.delete-success'),
            ], 200);
        } catch (\Exception $e) {
            report($e);
        }

        return response()->json([
            'message' => trans('saas::app.super.settings.exchange-rates.delete-failed')
        ], 500);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $suppressFlash = true;

        $exchangeRateIds = $massDestroyRequest->input('indices');

        foreach ($exchangeRateIds as $exchangeRateId) {
            $this->exchangeRateRepository->find($exchangeRateId);

            try {
                $suppressFlash = true;
                
                Event::dispatch('super.settings.exchange_rate.delete.before', $exchangeRateId);

                $this->exchangeRateRepository->delete($exchangeRateId);

                Event::dispatch('super.settings.exchange_rate.delete.after', $exchangeRateId);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'message' => trans('saas::app.super.settings.exchange-rates.delete-failed'),
                ], 500);
            }
        }

        if ($suppressFlash) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.exchange-rates.delete-success'),
            ], 200);
        }

        return redirect()->route('super.settings.exchange_rates.index');
    }
}
