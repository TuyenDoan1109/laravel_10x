<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\GroupUser\GroupUserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\GroupUser\CreateGroupUserRequest;
use App\Http\Requests\GroupUser\UpdateGroupUserRequest;
use Illuminate\Support\Facades\Hash;
use Session;


class GroupUserController extends Controller
{
    protected $userGroupRepo;

    public function __construct(
        GroupUserRepositoryInterface $userGroupRepo,
    ) 
    {
        $this->userGroupRepo = $userGroupRepo;
    }
    
    public function index(Request $request)
    {
        $this->resetSessionSearch('admin.userGroup.index');

        if ($request->confirmSearch == 1) {
            session(['keySearch' => trim($request->keySearch)]);
            return redirect(route('admin.userGroup.index'));
        }

        if ($request->confirmPerPage == 1) {
            session(['perPage' => $request->perPage]);
            return redirect(route('admin.userGroup.index'));
        }

        if ($request->confirmStatus == 1) {
            session(['filter.status' => $request->status]);
            return redirect(route('admin.userGroup.index'));
        }

        $dataOption = [
            'perPage' => Session::has('perPage') ? (int)Session::get('perPage') : 10,
            'with' => [], 
            'orderBy' => ['id', 'desc'], 
            'keySearch' => Session::has('keySearch') ? Session::get('keySearch') : '',
            'filter' => [
                'status' => Session::has('filter.status') ? Session::get('filter.status') : ''
            ]
        ];

        $userGroups = $this->userGroupRepo->paginate(
            $dataOption['perPage'], 
            $dataOption['with'], 
            $dataOption['orderBy'], 
            $dataOption['keySearch'], 
            $dataOption['filter']
        );

        return view('admin.userGroups.index', compact(
            'userGroups'
        ));
    }

    public function create()
    {
        dd(444444444);
    }

    public function store(CreateGroupUserRequest $request)
    {
        dd(444444444);
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
