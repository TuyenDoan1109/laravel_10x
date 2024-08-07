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
                                    <a href="{{ route('admin.user.index') }}">QL Khách hàng</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item font-weight-bold">Danh sách khách hàng</li>
                            </ul>
                        </div>
                        <button class="btn btn-sm btn-success">
                            <i class="zmdi zmdi-plus mr-1"></i>Thêm khách hàng
                        </button>
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
                    <div class="rs-select2--dark rs-select2--lg m-r-10 rs-select2--border">
                        <select class="js-select2" name="property">
                            <option selected="selected">Chọn nhóm khách hàng</option>
                            <option value="">Nhóm 1</option>
                            <option value="">Nhóm 2</option>
                            <option value="">Nhóm 3</option>
                            <option value="">Nhóm 4</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <div class="rs-select2--dark rs-select2--sm m-r-10 rs-select2--border">
                        <select class="js-select2 au-select-dark" name="time">
                            <option selected="selected">Tình trạng</option>
                            <option value="">By Month</option>
                            <option value="">By Day</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
                    <form class="au-form-icon--sm" action="" method="post">
                        <input class="au-input--w300 au-input--style2 line-height-38" type="text" placeholder="Tìm kiếm...">
                        <button class="au-btn--submit2" type="submit">
                            <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div>

                <div class="perpage">
                    <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                        <select class="js-select2 au-select-dark" name="time">
                            <option selected="selected">10 bản ghi</option>
                            <option value="">By Month</option>
                            <option value="">By Day</option>
                        </select>
                        <div class="dropDownSelect2"></div>
                    </div>
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

                        @foreach($users as $user)
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" class="checkItem" name="" id="">
                                </td>
                                <td class="text-center">{{ $user->name }}</td>
                                <td class="text-center">tuyen@gmail.com</td>
                                <td class="text-center">0936827526</td>
                                <td class="text-center">phú xuyên</td>
                                <td class="text-center">Admin</td>
                                <td class="text-center">
                                    <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" checked="true">
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
        </div>
    </div>
</div>

@endsection