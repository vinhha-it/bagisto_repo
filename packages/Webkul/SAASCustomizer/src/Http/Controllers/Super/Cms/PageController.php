<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Cms;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Event;
use Webkul\Admin\Http\Requests\MassDestroyRequest;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Cms\PageDataGrid;
use Webkul\SAASCustomizer\Repositories\Super\CmsRepository;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Super\Cms\CmsRepository  $cmsRepository
     * @return void
     */
    public function __construct(protected CmsRepository $cmsRepository)
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
            return datagrid(PageDataGrid::class)->process();
        }

        return view('saas::super.cms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('saas::super.cms.create');
    }

    /**
     * To store a new CMS page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'url_key'      => ['required', 'unique:super_cms_page_translations,url_key', new \Webkul\Core\Rules\Slug],
            'page_title'   => 'required',
            'channels'     => 'required',
            'html_content' => 'required',
        ]);

        Event::dispatch('super.settings.cms.pages.create.before');

        $data = request()->only([
            'page_title',
            'channels',
            'html_content',
            'meta_title',
            'url_key',
            'meta_keywords',
            'meta_description',
        ]);

        $page = $this->cmsRepository->create($data);

        Event::dispatch('super.settings.cms.pages.create.after', $page);

        session()->flash('success', trans('saas::app.super.cms.create-success'));

        return redirect()->route('super.cms.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $page = $this->cmsRepository->findOrFail($id);

        return view('saas::super.cms.edit', compact('page'));
    }

    /**
     * To update the previously created CMS page in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $locale = core()->getRequestedLocaleCode();

        $this->validate(request(), [
            $locale.'.url_key'      => ['required', new \Webkul\Core\Rules\Slug, function ($attribute, $value, $fail) use ($id) {
                if (! $this->cmsRepository->isUrlKeyUnique($id, $value)) {
                    $fail(trans('admin::app.cms.index.already-taken', ['name' => 'Page']));
                }
            }],
            $locale.'.page_title'   => 'required',
            $locale.'.html_content' => 'required',
            'channels'              => 'required',
        ]);
        
        Event::dispatch('super.settings.cms.pages.update.before', $id);

        $data = [
            $locale    => request()->input($locale),
            'channels' => request()->input('channels'),
            'locale'   => $locale,
        ];

        $page = $this->cmsRepository->update($data, $id);

        Event::dispatch('super.settings.cms.pages.update.after', $page);

        session()->flash('success', trans('saas::app.super.cms.update-success'));

        return redirect()->route('super.cms.index');
    }

    /**
     * To delete the previously create CMS page.
     */
    public function destroy(int $id): JsonResponse
    {
        Event::dispatch('super.settings.cms.pages.delete.before', $id);

        $this->cmsRepository->delete($id);

        Event::dispatch('super.settings.cms.pages.delete.after', $id);

        return new JsonResponse(['message' => trans('saas::app.super.cms.delete-success')]);
    }

    /**
     * To mass delete the CMS resource from storage.
     */
    public function massDestroy(MassDestroyRequest $massDestroyRequest): JsonResponse
    {
        $indices = $massDestroyRequest->input('indices');

        foreach ($indices as $index) {
            Event::dispatch('super.settings.cms.pages.delete.before', $index);

            $this->cmsRepository->delete($index);

            Event::dispatch('super.settings.cms.pages.delete.after', $index);
        }

        return new JsonResponse([
            'message' => trans('saas::app.super.cms.index.datagrid.mass-delete-success')
        ], 200);
    }
}
