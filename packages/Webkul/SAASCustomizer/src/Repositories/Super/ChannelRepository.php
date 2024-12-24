<?php

namespace Webkul\SAASCustomizer\Repositories\Super;

use Illuminate\Support\Facades\Storage;
use Webkul\Core\Eloquent\Repository;
use Webkul\SAASCustomizer\Models\SuperChannel;

// SuperChannelProxy

class ChannelRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return SuperChannel::class;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $channel = parent::update($data, $id, $attribute);

        $channel->locales()->sync($data['locales']);

        $channel->currencies()->sync($data['currencies']);

        $this->uploadImages($data, $channel);

        $this->uploadImages($data, $channel, 'favicon');

        return $channel;
    }

    /**
     * Upload images.
     *
     * @param  array  $data
     * @param  \Webkul\SAASCustomizer\Contracts\SuperChannel  $superChannel
     * @param  string  $type
     * @return void
     */
    public function uploadImages($data, $channel, $type = 'logo')
    {
        if (request()->hasFile($type)) {
            $channel->{$type} = current(request()->file($type))->store('super_channel/'.$channel->id);

            $channel->save();
        } else {
            if (! isset($data[$type])) {
                if (! empty($data[$type])) {
                    Storage::delete($channel->{$type});
                }

                $channel->{$type} = null;

                $channel->save();
            }
        }
    }
}