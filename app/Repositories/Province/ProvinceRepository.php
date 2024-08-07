<?php

namespace App\Repositories\Province;

use App\Repositories\BaseRepository;
use App\Models\Province;

class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    public function getModel()
    {
        return Province::class;
    }

    

}


