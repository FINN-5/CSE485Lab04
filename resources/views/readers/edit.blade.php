@extends('layout.userlayout')
@section('title', 'Sửa thông tin độc giả')
@section('main')

<div class="container mt-5">
    <h3 class="text-center text-uppercase text-primary my-3">Chỉnh sửa thông tin độc giả</h3>

    <form method="post" action="{{ route('readers.update', $reader->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Họ và tên</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $reader->name }}" required>
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Ngày sinh</label>
            <input type="date" id="birthday" name="birthday" class="form-control" value="{{ $reader->birthday }}" required>
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ $reader->address }}" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Số điện thoại</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ $reader->phone }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('readers.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
    </form>
</div>

@endsection
