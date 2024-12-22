@extends('layout.userlayout')
@section('title','Thêm độc giả')
@section('main')

<div class="container mt-5">
    <h3 class="text-center text-uppercase text-success my-3">Thêm độc giả mới</h3>

    <form method="post" action="{{route('readers.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Họ tên</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Ngày sinh</label>
            <input type="date" id="birthday" name="birthday" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Lưu</button>
        <a href="{{ route('readers.index') }}" class='btn btn-secondary'>Quay lại danh sách</a>
    </form>
</div>
@endsection

