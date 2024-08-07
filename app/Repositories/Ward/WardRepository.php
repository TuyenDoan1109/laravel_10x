<?php

namespace App\Repositories\Ward;

use App\Repositories\BaseRepository;
use App\Models\Ward;

class WardRepository extends BaseRepository implements WardRepositoryInterface
{
    public function getModel()
    {
        return Ward::class;
    }

    public function getWardByDistrictId(int $districtId)
    {
        return $this->model->where('district_code', $districtId)->get();
    }

}


