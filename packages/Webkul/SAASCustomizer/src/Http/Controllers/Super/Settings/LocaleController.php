<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Http\JsonResponse;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\DataGrids\Settings\LocaleDataGrid;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Repositories\Super\ChannelRepository;
use Webkul\SAASCustomizer\Repositories\Super\LocaleRepository;

class LocaleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\ChannelRepository  $channelRepository
     * @param  \Webkul\SAASCustomizer\Repositories\LocaleRepository  $localeRepository
     * @return void
     */
    public function __construct(
        protected ChannelRepository $channelRepository,
        protected LocaleRepository $localeRepository
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
            return datagrid(LocaleDataGrid::class)->process();
        }

        return view('saas::super.settings.locales.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas::super.settings.locales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(): JsonResponse
    {
        $this->validate(request(), [
            'code'      => ['required', 'unique:super_locales,code', new \Webkul\Core\Rules\Code],
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $data = request()->only([
            'code',
            'name',
            'direction',
        ]);
        
        $data['logo_path'] = request()->file('logo_path');

        $locale = $this->localeRepository->create($data);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.locales.create-success'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): JsonResponse
    {
        $locale = $this->localeRepository->findOrFail($id);

        return new JsonResponse([
            'data' => $locale,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(): JsonResponse
    {
        $this->validate(request(), [
            'code'      => ['required', 'unique:super_locales,code,'.request()->id, new \Webkul\Core\Rules\Code],
            'name'      => 'required',
            'direction' => 'in:ltr,rtl',
        ]);

        $data = request()->only([
            'code',
            'name',
            'direction',
        ]);

        $data['logo_path'] = request()->file('logo_path');

        $locale = $this->localeRepository->update($data, request()->id);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.locales.update-success'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id): JsonResponse
    {
        $this->localeRepository->findOrFail($id);

        if ($this->localeRepository->count() == 1) {
            return response()->json([
                'message' => trans('saas::app.super.settings.locales.last-delete-error'),
            ], 400);
        }

        try {
            $this->localeRepository->delete($id);

            return new JsonResponse([
                'message' => trans('saas::app.super.settings.locales.delete-success'),
            ]);
        } catch (\Exception $e) {
        }

        return response()->json([
            'message' => trans('saas::app.super.settings.locales.delete-failed'),
        ], 500);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        if ($this->localeRepository->count() == 1) {
            return response()->json([
                'message' => trans('saas::app.super.settings.locales.last-delete-error'),
            ], 400);
        }

        $defaultLocaleId = $this->channelRepository->first()->default_locale_id;

        $suppressFlash = true;

        $localeIds = $massDestroyRequest->input('indices');

        foreach ($localeIds as $localeId) {
            $locale = $this->localeRepository->find($localeId);

            if ($defaultLocaleId == $localeId) {
                return new JsonResponse(['message' => trans('saas::app.super.settings.locales.being-used', [
                    'locale_name' => $locale->name,
                ])], 400);
            }

            try {
                $suppressFlash = true;

                $this->localeRepository->delete($localeId);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'message' => trans('saas::app.super.settings.locales.delete-failed'),
                ], 500);
            }
        }

        if ($suppressFlash) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.locales.delete-success'),
            ], 200);
        }

        return redirect()->route('super.settings.locales.index');
    }
}
