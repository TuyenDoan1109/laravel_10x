<?php

namespace App\Repositories\Admin;

use App\Repositories\BaseRepository;
use App\Models\Admin;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    public function getModel()
    {
        return Admin::class;
    }

    public function paginate(
        int $perPage = 20,
        array $with = [], 
        array $orderBy = ['id', 'desc'], 
        string $keySearch = '',
        array $filter = []
    ) 
    {
        // dd($filter['status']);
        return $this->model::query()
            ->where('deleted_at', null)
            ->when(!empty($with), function($q) use ($with){
                $q->with($with);
            })
            ->when(!empty($keySearch), function($q) use ($keySearch){
                $q->where(function($sub) use ($keySearch){
                    $sub->where('name', 'like', '%' . $keySearch . '%')
                    ->orWhere('email', 'like', '%' . $keySearch . '%')
                    ->orWhere('phone', 'like', '%' . $keySearch . '%')
                    ->orWhere('address', 'like', '%' . $keySearch . '%');
                });
            })
            
            ->when(($filter['status'] != ''), function($q) use ($filter){
                $q->where('status', $filter['status']);
            })
            ->when(!empty($filter['adminGroup']), function($q) use ($filter){
                $q->where('admin_group_id', $filter['adminGroup']);
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->paginate($perPage);
    }

}


