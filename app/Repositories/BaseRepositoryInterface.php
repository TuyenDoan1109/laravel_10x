<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    public function getAll();
    public function paginate(
        int $perPage = 10,
        array $with = [], 
        array $orderBy = ['id', 'desc'], 
        string $keySearch = ''
    );
    public function create(array $dataRequest);
}
