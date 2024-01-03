<?php


namespace App\Repositories\Ads\Eloquent;

use App\Repositories\Ads\AdsRepository;
use Illuminate\Support\Facades\Storage;
use App\Repositories\EloquentBaseRepository;

class EloquentAdsRepository extends EloquentBaseRepository implements AdsRepository
{

    public function adminUpdate($model, $data)
    {
        $data['user_id'] = auth()->id();
        $oldImage = $model->image;
        if ($data['image'] != $oldImage) {
            $path = $data['image']->store('public/posts-images');
            $path = str_replace('public', 'storage', $path);
            Storage::disk('public')->delete($oldImage ?? '');
            $data['image'] = $path;
        }

        $this->update($model, $data);
    }
}
