<?php


namespace App\Repositories\SubCategory;

use App\Repositories\BaseRepository;

interface SubCategoryRepository extends BaseRepository
{
    public function adminUpdate($model, $data);
}
