@extends('layout.userlayout')
@section('title','Sửa sách')
@section('main')

<div class="container mt-5">
    <h3 class="text-center text-uppercase text-primary my-3">Chỉnh sửa thông tin sách</h3>

    <form method="post" action="{{route('books.update', $book->id)}}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tên sách</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$book->name}}" required>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Tác giả</label>
            <input type="text" id="author" name="author" class="form-control" value="{{$book->author}}" required>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Thể loại</label>
            <input type="text" id="category" name="category" class="form-control" value="{{$book->category}}" required>
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Năm xuất bản</label>
            <input type="number" id="year" name="year" class="form-control" value="{{$book->year}}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Số lượng</label>
            <input type="number" id="quantity" name="quantity" class="form-control" value="{{$book->quantity}}" required>
        </div>


        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('books.index') }}" class='btn btn-secondary'>Quay lại trang chủ</a>



    </form>
</div>
@endsection