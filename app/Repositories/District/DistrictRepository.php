<?php

namespace App\Repositories\District;

use App\Repositories\BaseRepository;
use App\Models\District;

class DistrictRepository extends BaseRepository implements DistrictRepositoryInterface
{
    public function getModel()
    {
        return District::class;
    }

    public function getDistrictByProvinceId(int $provinceId)
    {
        return $this->model->where('province_code', $provinceId)->get();
    }

}


