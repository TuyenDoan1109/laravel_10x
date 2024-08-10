<?php

namespace App\Repositories\GroupAdmin;

use App\Repositories\BaseRepository;
use App\Models\GroupAdmin;

class GroupAdminRepository extends BaseRepository implements GroupAdminRepositoryInterface
{
    public function getModel()
    {
        return GroupAdmin::class;
    }

    public function paginate(
        int $perPage = 10,
        array $with = [], 
        array $orderBy = ['id', 'desc'], 
        string $keySearch = '',
        array $filter = []
    ) 
    {
        return $this->model::query()
            ->where('deleted_at', null)
            ->when(!empty($with), function($q) use ($with){
                $q->with($with);
            })
            ->when(!empty($keySearch), function($q) use ($keySearch){
                $q->where(function($sub) use ($keySearch){
                    $sub->where('name', 'like', '%' . $keySearch . '%')
                    ->orWhere('description', 'like', '%' . $keySearch . '%');
                });
            })
            
            ->when(($filter['status'] != ''), function($q) use ($filter){
                $q->where('status', $filter['status']);
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->paginate($perPage);
    }

}


