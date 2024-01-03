<?php


namespace App\Repositories\Ads;

use App\Repositories\BaseRepository;

interface AdsRepository extends BaseRepository
{

    public function adminUpdate($model, $data);
}
