@extends('layout.userlayout')
@section('title','Thêm sách')
@section('main')

<div class="container mt-5">
    <h3 class="text-center text-uppercase text-primary my-3">Thêm sách mới</h3>

    <form method="post" action="{{route('books.store')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Tên sách</label>
            <input type="text" id="name" name="name" class="form-control" value="" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <input type="description" id="author" name="author" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Thể loại</label>
            <input type="text" id="category" name="category" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Năm xuất bản</label>
            <input type="number" id="year" name="year" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" id="quantity" name="quantity" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('books.index') }}" class='btn btn-secondary'>Quay lại trang chủ</a>



    </form>
</div>
@endsection