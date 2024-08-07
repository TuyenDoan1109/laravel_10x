<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // Xóa session tìm kiếm nếu chuyển controller
    public function resetSessionSearch($currentRouteName) 
    {
        // get previous route name
        $url = url()->previous();
        $previousRouteName = app('router')->getRoutes($url)->match(app('request')->create($url))->getName();
        
        if($previousRouteName != $currentRouteName) {
            session()->forget('keySearch');
            session()->forget('perPage');
            session()->forget('filter');
        }
    }
}
