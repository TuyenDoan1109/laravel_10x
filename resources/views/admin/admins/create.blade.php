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
                                    <a href="{{ route('admin.admin.index') }}">QL Thành viên</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item font-weight-bold">Thêm mới thành viên</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END BREADCRUMB-->

@endsection


@section('content')
<form action="{{ route('admin.admin.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-4">
            <h5 class="heading-title">Thông tin chung</h5>
            <p>Nhập thông tin chung của người sử dụng</p>
            <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
        </div>
    
        <div class="col-8">
            <div class="card">
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email <span class="text-danger">(*)</span></label>
                                <input type="text" name="email" id="email" placeholder="Nhập email..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="group" class=" form-control-label">Nhóm thành viên <span class="text-danger">(*)</span></label>
                                <select name="adminGroup" id="adminGroup" class="form-control">
                                    <option value="">-- Chọn nhóm thành viên --</option>
                                    @foreach($adminGroups as $adminGroup)
                                        <option value="{{ $adminGroup->id }}">{{ $adminGroup->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Mật khẩu <span class="text-danger">(*)</span></label>
                                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu..." class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Họ tên <span class="text-danger">(*)</span></label>
                                <input type="text" name="name" id="name" placeholder="Nhập họ tên..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="birthday" class=" form-control-label">Ngày sinh</label>
                                <input type="date" name="birthday" id="birthday" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="re_password" class=" form-control-label">Nhập lại mật khẩu <span class="text-danger">(*)</span></label>
                                <input type="password" name="re_password" id="re_password" placeholder="Nhập lại mật khẩu..." class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="avatar" class=" form-control-label">Ảnh đại diện</label>
                                <input type="file" name="avatar" id="avatar" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
    <hr>
    
    <div class="row">
        <div class="col-4">
            <h5 class="heading-title">Thông tin liên hệ</h5>
            <p>Nhập thông tin liên hệ của người sử dụng</p>
        </div>
    
        <div class="col-8">
            <div class="card">
                <div class="card-body card-block">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="province" class=" form-control-label">Thành Phố</label>
                                <select name="province" id="province" class="form-control">
                                    <option value="">-- Chọn thành phố --</option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->code }}">{{ $province->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ward" class=" form-control-label">Phường / Xã</label>
                                <select name="ward" id="ward" class="form-control">
                                    <option value="">--Chọn Phường / Xã--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="phone" class=" form-control-label">Số điện thoại</label>
                                <input type="text" name="phone" id="phone" placeholder="Nhập số điện thoại..." class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="district" class=" form-control-label">Quận / Huyện</label>
                                <select name="district" id="district" class="form-control">
                                    <option value="">--Chọn Quận / Huyện--</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="address" class=" form-control-label">Địa chỉ</label>
                                <input type="text" name="address" id="address" placeholder="Nhập địa chỉ..." class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="note" class=" form-control-label">Ghi chú</label>
                                <input type="text" name="note" id="note" placeholder="Nhập ghi chú..." class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <br>
                            <div class="form-actions form-group d-flex flex-row-reverse">
                                <button class="btn btn-success">Lưu lại</button> 
                                <a href="{{ route('admin.admin.index') }}" class="btn btn-danger mr-2">Hủy bỏ</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</form>


@endsection

@section('additionalJs')
<script src="{{ asset('backend/js/admin/create.js') }}"></script>
@endsection