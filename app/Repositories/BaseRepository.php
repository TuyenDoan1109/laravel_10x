<?php

namespace App\Repositories;

abstract class BaseRepository implements BaseRepositoryInterface
{
    // model muốn tương tác
    protected $model;

    public function __construct() {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel() {
        $this->model = app()->make($this->getModel());
    }

    public function getAll() {
        return $this->model->get();
    }

    public function paginate(
        int $perPage = 20,
        array $with = [], 
        array $orderBy = ['id', 'desc'], 
        string $keySearch = ''
    ) 
    {
        return $this->model::query()
            ->where('deleted_at', null)
            ->when(!empty($with), function($q) use ($with){
                $q->with($with);
            })
            ->orderBy($orderBy[0], $orderBy[1])
            ->paginate($perPage);
    }


//     public function getAllWithSearch($limit, $order, $keySearch)
//     {
//         $orderTypes = ['asc', 'desc'];
//         $columns = app($this->getModel())->getFillable();
//         $limit = $limit ?? config('app.paginate.per_page');

//         $orderBy = in_array($order[0], $columns) ? $order[0] : 'id';
//         $orderType = in_array($order[1], $orderTypes) ? $order[1] : 'desc';

//         if(!empty($keySearch)) {
//             $data = $this->model::where(function ($q1) use ($keySearch)
//             {
//                 $q1->where('name', 'like', '%' . $keySearch . '%')
//                     ->orWhere('content', 'like', '%' . $keySearch . '%');
//             });
//             $data->orderBy($orderBy, 'asc');

//         } else {
//             $data = $this->model->orderBy($orderBy, $orderType);
//         }

// //        return $data->get();

//         return $data->paginate($limit);
//     }






    public function create(array $dataRequest) {
        return $this->model->create($dataRequest);    // return an instance
    }

    // public function getWith(
    //     array $column = ['*'], 
    //     array $condition = [], 
    //     int $perPage = 10,
    //     array $orderBy = ['id', 'DESC'],
    // ) 
    // {

    // }

}
