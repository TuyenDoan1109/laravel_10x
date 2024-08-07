<?php

namespace App\Repositories\District;

use App\Repositories\BaseRepositoryInterface;

interface DistrictRepositoryInterface extends BaseRepositoryInterface
{
    public function getDistrictByProvinceId(int $provinceId);
}
