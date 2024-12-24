<?php

namespace Webkul\SAASCustomizer\Http\Controllers\Super\Settings;

use Illuminate\Support\Facades\Event;
use Webkul\SAASCustomizer\Http\Controllers\Controller;
use Webkul\SAASCustomizer\DataGrids\Settings\ChannelDataGrid;
use Webkul\SAASCustomizer\Repositories\Super\ChannelRepository;

class ChannelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\SAASCustomizer\Repositories\Super\ChannelRepository  $channelRepository
     * @return void
     */
    public function __construct(protected ChannelRepository $channelRepository)
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
            return datagrid(ChannelDataGrid::class)->process();
        }

        return view('saas::super.settings.channels.index');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        $channel = $this->channelRepository->with(['locales', 'currencies'])->findOrFail($id);

        return view('saas::super.settings.channels.edit', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(int $id)
    {
        $locale = company()->getRequestedLocaleCode();
        
        $data = $this->validate(request(), [
            /* general */
            'code'                             => ['required', 'unique:super_channels,code,'.$id, new \Webkul\Core\Rules\Code],
            $locale.'.name'                  => 'required',
            $locale.'.description'           => 'nullable',
            'hostname'                         => 'unique:super_channels,hostname,'.$id,

            /* currencies and locales */
            'locales'                          => 'required|array|min:1',
            'default_locale_id'                => 'required|in_array:locales.*',
            'currencies'                       => 'required|array|min:1',
            'base_currency_id'                 => 'required|in_array:currencies.*',

            /* design */
            'theme'                            => 'nullable',
            'logo.*'                           => 'nullable|mimes:bmp,jpeg,jpg,png,webp',
            'favicon.*'                        => 'nullable|mimes:bmp,jpeg,jpg,png,webp,ico',

            /* seo */
            $locale.'.seo_title'             => 'nullable',
            $locale.'.seo_description'       => 'nullable',
            $locale.'.seo_keywords'          => 'nullable',
        ]);

        $data = $this->setSEOContent($data, $locale);
        
        Event::dispatch('super.settings.channel.update.before', $id);

        $channel = $this->channelRepository->update($data, $id);

        Event::dispatch('super.settings.channel.update.after', $channel);

        if ($channel->base_currency->code !== session()->get('currency')) {
            session()->put('currency', $channel->base_currency->code);
        }

        session()->flash('success', trans('saas::app.super.settings.channels.update-success'));

        return redirect()->route('super.settings.channels.index');
    }

    /**
     * Set the seo content and return back the updated array.
     *
     * @param  string  $locale
     * @return array
     */
    private function setSEOContent(array $data, $locale = null)
    {
        $editedData = $data;

        if ($locale) {
            $editedData = $data[$locale];
        }

        $editedData['home_seo']['meta_title'] = $editedData['seo_title'];

        $editedData['home_seo']['meta_description'] = $editedData['seo_description'];
        
        $editedData['home_seo']['meta_keywords'] = $editedData['seo_keywords'];

        $editedData = $this->unsetKeys($editedData, ['seo_title', 'seo_description', 'seo_keywords']);

        if ($locale) {
            $data[$locale] = $editedData;
            $editedData = $data;
        }

        return $editedData;
    }

    /**
     * Unset keys.
     *
     * @param  array  $keys
     * @return array
     */
    private function unsetKeys($data, $keys)
    {
        foreach ($keys as $key) {
            unset($data[$key]);
        }

        return $data;
    }
}
