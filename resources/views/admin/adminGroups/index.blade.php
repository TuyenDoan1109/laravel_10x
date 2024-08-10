@extends('admin.layouts.adminApp')

@section('breadcrumb')

<!-- BREADCRUMB-->
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item active">
                                    <a href="{{ route('admin.groupAdmin.index') }}">QL Nhóm thành viên</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item font-weight-bold">Danh sách nhóm thành viên</li>
                            </ul>
                        </div>
                        <a href="{{ route('admin.groupAdmin.create') }}" class="btn btn-sm btn-success text-white">
                            <i class="zmdi zmdi-plus mr-1"></i>Thêm nhóm thành viên
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

@endsection


@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body d-flex justify-content-between">
                {{-- <strong class="card-title mb-3">Profile Card</strong> --}}
                <div class="filters d-flex">
                    <form id="statusForm" action="{{ route('admin.groupAdmin.filterStatus') }}" method="post">
                        @csrf
                        <input type="hidden" value="1" name="confirmStatus">
                        <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border">
                            <select id="status" class="js-select2 au-select-dark" name="status">
                                <option value="">Tình trạng</option>
                                <option {{ session('filter.status') === "1" ? 'selected' : '' }} value="1">Hoạt động</option>
                                <option {{ session('filter.status') === "0" ? 'selected' : '' }} value="0">Không hoạt động</option>
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </form>
                    
                    <form class="au-form-icon--sm" action="{{ route('admin.groupAdmin.search') }}" method="post">
                        @csrf
                        <input class="au-input--w300 au-input--style2 line-height-38" value="{{ session('keySearch') }}" name="keySearch" type="text" placeholder="Tìm kiếm...">
                        <input type="hidden" value="1" name="confirmSearch">
                        <button class="au-btn--submit2" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>

                <div class="perpage">
                    <form id="perPageForm" action="{{ route('admin.groupAdmin.perPage') }}" method="post">
                        @csrf
                        <input type="hidden" value="1" name="confirmPerPage">
                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                            <select id="perPage" class="js-select2 au-select-dark" name="perPage">
                                @for($i = 10; $i <= 100; $i += 10)
                                    <option
                                        value="{{ $i }}"
                                        @if(session('perPage') == $i)
                                            selected
                                        @endif
                                    >
                                        {{ $i }} bản ghi
                                    </option>
                                @endfor
                            </select>
                            <div class="dropDownSelect2"></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <input type="checkbox" class="checkAll" name="" id="">
                            </th>
                            <th class="text-center">Họ Tên</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Nhóm thành viên</th>
                            <th class="text-center">Tình trạng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($adminGroups as $adminGroup)
                        <tr>
                            <td class="text-center">
                                <input type="checkbox" class="checkItem" name="" id="">
                            </td>
                            <td class="text-center">{{ $adminGroup->name }}</td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <label class="switch switch-3d switch-primary mr-3">
                                    <input 
                                        type="checkbox" 
                                        class="switch-input"
                                        checked="true"
                                    >
                                    <span class="switch-label"></span>
                                    <span class="switch-handle"></span>
                                </label>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        Showing {{ $adminGroups->firstItem() }} to {{ $adminGroups->lastItem() }} of {{ $adminGroups->total() }} entries
                    </div>
                    <div>
                        {{ $adminGroups->links('vendor.pagination.custom') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('additionalJs')
<script src="{{ asset('backend/js/groupAdmin/index.js') }}"></script>
@endsection






