<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Http\Requests\ConfigurationForm;
use Webkul\SAASCustomizer\Repositories\Super\SuperConfigRepository;

class ConfigurationController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct(protected SuperConfigRepository $superConfigRepository)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (
            request()->route('slug')
            && request()->route('slug2')
        ) {
            return view('saas::super.configuration.edit');
        }

        return view('saas::super.configuration.index');
    }

    /**
     * Display a listing of the resource.
     */
    public function search(): JsonResponse
    {
        $results = $this->superConfigRepository->search(
            super_system_config()->getItems(),
            request()->query('query')
        );

        return new JsonResponse([
            'data' => $results,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConfigurationForm $request): RedirectResponse
    {
        $data = $request->all();

        if (isset($data['sales']['carriers'])) {
            $atLeastOneCarrierEnabled = false;

            foreach ($data['sales']['carriers'] as $carrier) {
                if ($carrier['active']) {
                    $atLeastOneCarrierEnabled = true;

                    break;
                }
            }

            if (! $atLeastOneCarrierEnabled) {
                session()->flash('error', trans('saas::app.super.configuration.enable-at-least-one-shipping'));

                return redirect()->back();
            }
        } elseif (isset($data['sales']['payment_methods'])) {
            $atLeastOnePaymentMethodEnabled = false;

            foreach ($data['sales']['payment_methods'] as $paymentMethod) {
                if ($paymentMethod['active']) {
                    $atLeastOnePaymentMethodEnabled = true;

                    break;
                }
            }

            if (! $atLeastOnePaymentMethodEnabled) {
                session()->flash('error', trans('saas::app.super.configuration.enable-at-least-one-payment'));

                return redirect()->back();
            }
        }

        Event::dispatch('super.configuration.save.before');

        $this->superConfigRepository->create($request->except(['_token', 'admin_locale']));

        Event::dispatch('super.configuration.save.after');

        session()->flash('success', trans('saas::app.super.configuration.save-message'));

        return redirect()->back();
    }

    /**
     * Download the file for the specified resource.
     */
    public function download(): StreamedResponse
    {
        $path = request()->route()->parameters()['path'];

        $fileName = 'configuration/'.$path;

        $config = $this->superConfigRepository->findOneByField('value', $fileName);

        return Storage::download($config['value']);
    }
}