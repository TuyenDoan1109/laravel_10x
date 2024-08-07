<?php

namespace App\Repositories\Ward;

use App\Repositories\BaseRepositoryInterface;

interface WardRepositoryInterface extends BaseRepositoryInterface
{
    public function getWardByDistrictId(int $districtId);
}
