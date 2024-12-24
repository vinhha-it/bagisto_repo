<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Support\Facades\Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\Repositories\Company\ThemeRepository;
use Webkul\SAASCustomizer\DataGrids\Settings\ThemeDataGrid;

class ThemeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(public ThemeRepository $themeRepository)
    {
    }

    /**
     * Display a listing resource for the available tax rates.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if (request()->ajax()) {
            return datagrid(ThemeDataGrid::class)->process();
        }

        return view('saas::super.settings.themes.index');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function store()
    {
        if (request()->has('id')) {
            $theme = $this->themeRepository->find(request()->input('id'));

            return $this->themeRepository->uploadImage(request()->all(), $theme);
        }

        $this->validate(request(), [
            'name'       => 'required',
            'sort_order' => 'required|numeric',
            'type'       => 'in:static_content,image_carousel,footer_links,services_content',
            'channel_id' => 'required|in:'.implode(',', (company()->getAllChannels()->pluck("id")->toArray())),
        ]);

        Event::dispatch('super.settings.theme.create.before');

        $data = request()->only([
            "name",
            "sort_order",
            "type",
            "channel_id"
        ]);

        $theme = $this->themeRepository->create($data);

        Event::dispatch('super.settings.theme.create.after', $theme);

        return new JsonResponse([
            'redirect_url' => route('super.settings.themes.edit', $theme->id),
        ]);
    }

    /**
     * Edit the theme
     * 
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $theme = $this->themeRepository->find($id);

        return view('saas::super.settings.themes.edit', compact('theme'));
    }

    /**
     * Update the specified resource
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(int $id)
    {
        $locale = company()->getRequestedLocaleCode('locale');

        $data = request()->all();

        if ($data['type'] == 'static_content') {
            $data[$locale]['options']['html'] = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $data[$locale]['options']['html']); 
            $data[$locale]['options']['css'] = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', "", $data[$locale]['options']['css']); 
        }

        $data['status'] = request()->input('status') == 'on';

        if (in_array($data['type'], ['image_carousel', 'services_content'])) {
            unset($data['options']);
        }

        Event::dispatch('super.settings.theme.update.before', $id);

        $theme = $this->themeRepository->update($data, $id);

        if (in_array($data['type'], ['image_carousel', 'services_content'])) {
            $this->themeRepository->uploadImage(
                $data[$locale],
                $theme,
                request()->input('deleted_sliders', []),
            );
        }

        Event::dispatch('super.settings.theme.update.after', $theme);

        session()->flash('success', trans('saas::app.super.settings.themes.update-success'));

        return redirect()->route('super.settings.themes.index');
    }

    /**
     * Delete a specified theme.
     */
    public function destroy(int $id): JsonResponse
    {
        Event::dispatch('super.settings.theme.delete.before', $id);

        $theme = $this->themeRepository->find($id);

        $theme?->delete();

        Storage::deleteDirectory('theme/'. $theme->id);

        Event::dispatch('super.settings.theme.delete.after', $id);

        return new JsonResponse([
            'message' => trans('saas::app.super.settings.themes.delete-success'),
        ], 200);
    }

    /**
     * Remove the specified resources from database.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $suppressFlash = true;

        $themeIds = $massDestroyRequest->input('indices');

        foreach ($themeIds as $themeId) {
            $theme = $this->themeRepository->find($themeId);

            try {
                $suppressFlash = true;
                
                Event::dispatch('super.settings.theme.delete.before', $themeId);

                $theme?->delete();

                Storage::deleteDirectory('theme/'. $theme->id);

                Event::dispatch('super.settings.theme.delete.after', $themeId);
            } catch (\Exception $e) {
                return new JsonResponse([
                    'message' => trans('saas::app.super.settings.themes.delete-failed'),
                ], 500);
            }
        }

        if ($suppressFlash) {
            return new JsonResponse([
                'message' => trans('saas::app.super.settings.themes.delete-success'),
            ], 200);
        }

        return redirect()->route('super.settings.themes.index');
    }
}
