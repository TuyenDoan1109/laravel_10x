<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }
    
    public function index(Request $request)
    {
        $this->resetSessionSearch('admin.user.index');

        $users = $this->userRepo->paginate();


        // $this->resetSessionSearch('admin/users');
        
        return view('admin.users.index', compact(
            'users', 
        ));
    }

    public function create()
    {
        dd(222222222);
    }

    public function store()
    {
        dd(333333333333);
    }

    public function edit()
    {
        dd(444444444);
    }

    public function update()
    {
        dd(555555555);
    }

    public function destroy()
    {
        dd(666666666);
    }
}
