<?php

namespace App\Repositories\AdminGroup;

use App\Repositories\BaseRepository;
use App\Models\AdminGroup;

class AdminGroupRepository extends BaseRepository implements AdminGroupRepositoryInterface
{
    public function getModel()
    {
        return AdminGroup::class;
    }

}


