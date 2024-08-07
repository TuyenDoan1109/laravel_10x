<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\AdminRepositoryInterface;
use App\Repositories\Province\ProvinceRepositoryInterface;
use App\Repositories\AdminGroup\AdminGroupRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CreateAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use Illuminate\Support\Facades\Hash;
use Session;


class AdminController extends Controller
{
    protected $adminRepo;
    protected $provinceRepo;
    protected $adminGroupRepo;
    public function __construct(
        AdminRepositoryInterface $adminRepo,
        ProvinceRepositoryInterface $provinceRepo,
        AdminGroupRepositoryInterface $adminGroupRepo,
    ) 
    {
        $this->adminRepo = $adminRepo;
        $this->provinceRepo = $provinceRepo;
        $this->adminGroupRepo = $adminGroupRepo;
    }
    
    public function index(Request $request)
    {
        $this->resetSessionSearch('admin.admin.index');

        $dataRequest = $request->all();

        // if($dataRequest['confirmSearch'] == 1 and  $request->comfirm_search=="1"){

        //     if(isset($request->page))
        //         session(['search.page' => (int)$request->page]);
        //     else
        //         session(['search.page' => 1]);

        //     if(isset($request->key_search))
        //         session(['search.key_search' => trim($request->key_search)]);
        //     else
        //         session(['search.key_search' => ""]);

        //      return redirect('admin/medal');
        // }
        // Session::put('perPage', 30);

        

        if ($request->confirmSearch == 1) {
            session(['keySearch' => trim($request->keySearch)]);
            return redirect(route('admin.admin.index'));
        }

        if ($request->confirmPerPage == 1) {
            session(['perPage' => $request->perPage]);
            return redirect(route('admin.admin.index'));
        }

        if ($request->confirmAdminGroup == 1) {
            session(['filter.adminGroup' => $request->adminGroup]);
            return redirect(route('admin.admin.index'));
        }

        if ($request->confirmStatus == 1) {
            session(['filter.status' => $request->status]);
            return redirect(route('admin.admin.index'));
        }

        $dataOption = [
            'perPage' => Session::has('perPage') ? (int)Session::get('perPage') : 10,
            'with' => ['adminGroup'], 
            'orderBy' => ['id', 'desc'], 
            'keySearch' => Session::has('keySearch') ? Session::get('keySearch') : '',
            'filter' => [
                'adminGroup' => Session::has('filter.adminGroup') ? Session::get('filter.adminGroup') : '',
                'status' => Session::has('filter.status') ? Session::get('filter.status') : ''
            ]
        ];

        $admins = $this->adminRepo->paginate(
            $dataOption['perPage'], 
            $dataOption['with'], 
            $dataOption['orderBy'], 
            $dataOption['keySearch'], 
            $dataOption['filter']
        );
        // dd($admins);
        $adminGroups = $this->adminGroupRepo->getAll();

        return view('admin.admins.index', compact(
            'admins',
            'adminGroups'
        ));
    }

    public function create()
    {
        $provinces = $this->provinceRepo->getAll();
        $adminGroups = $this->adminGroupRepo->getAll();
        return view('admin.admins.create', compact(
            'provinces',
            'adminGroups'
        ));
    }

    public function store(CreateAdminRequest $request)
    {
        // dd($request->all());
        $dataRequest = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),

            'admin_group' => $request['adminGroup'],
            'birthday' => $request['birthday'],
            'avatar' => 'test',
            'province' => $request['province'],
            'district' => $request['district'],
            'ward' => $request['ward'],
            'address' => $request['address'],
            'note' => $request['note'],
            'phone' => $request['phone'],
            
        ];
        // dd($dataRequest);
        $admin = $this->adminRepo->create($dataRequest);
        if($admin) {
            return redirect(route('admin.admin.index'))->with('success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Thêm mới thất bại');
        }
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
