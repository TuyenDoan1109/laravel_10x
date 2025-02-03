<?php

namespace App\Repositories\GroupUser;

use App\Repositories\BaseRepositoryInterface;

interface GroupUserRepositoryInterface extends BaseRepositoryInterface
{
    public function paginate(
        int $perPage = 10,
        array $with = [], 
        array $orderBy = ['id', 'desc'], 
        string $keySearch = '',
        array $filter = []
    );
}
