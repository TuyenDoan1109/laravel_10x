<?php

namespace App\Repositories\GroupAdmin;

use App\Repositories\BaseRepositoryInterface;

interface GroupAdminRepositoryInterface extends BaseRepositoryInterface
{
    public function paginate(
        int $perPage = 10,
        array $with = [], 
        array $orderBy = ['id', 'desc'], 
        string $keySearch = '',
        array $filter = []
    );
}
