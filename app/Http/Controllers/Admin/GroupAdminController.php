<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\GroupAdmin\GroupAdminRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\GroupAdmin\CreateGroupAdminRequest;
use App\Http\Requests\GroupAdmin\UpdateGroupAdminRequest;
use Illuminate\Support\Facades\Hash;
use Session;


class GroupAdminController extends Controller
{
    protected $adminGroupRepo;

    public function __construct(
        GroupAdminRepositoryInterface $adminGroupRepo,
    ) 
    {
        $this->adminGroupRepo = $adminGroupRepo;
    }
    
    public function index(Request $request)
    {
        $this->resetSessionSearch('admin.adminGroup.index');

        if ($request->confirmSearch == 1) {
            session(['keySearch' => trim($request->keySearch)]);
            return redirect(route('admin.adminGroup.index'));
        }

        if ($request->confirmPerPage == 1) {
            session(['perPage' => $request->perPage]);
            return redirect(route('admin.adminGroup.index'));
        }

        if ($request->confirmStatus == 1) {
            session(['filter.status' => $request->status]);
            return redirect(route('admin.adminGroup.index'));
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

        $adminGroups = $this->adminGroupRepo->paginate(
            $dataOption['perPage'], 
            $dataOption['with'], 
            $dataOption['orderBy'], 
            $dataOption['keySearch'], 
            $dataOption['filter']
        );

        return view('admin.adminGroups.index', compact(
            'adminGroups'
        ));
    }

    public function create()
    {
        dd(444444444);
    }

    public function store(CreateGroupAdminRequest $request)
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
