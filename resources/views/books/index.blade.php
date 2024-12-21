@extends('layout.userlayout')
@section('title', 'Danh sách Sách')
@section('main')
<h3 class="text-center text-uppercase text-success my-3">Danh sách Sách</h3>
<a href="{{route('books.create')}}" class='btn btn-success ms-1'><i class="bi bi-plus-circle"></i> Thêm sách mới mới</a>
@if (session('success'))
<div class="container">
    <div class="alert alert-success  alert-dismissible" role="alert">
        {{ session('success') }}
        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên sách</th>
            <th scope="col">Tác giả</th>
            <th scope="col">Thể loại</th>
            <th scope="col">Năm xuất bản</th>
            <th scope="col">Số lượng</th>
            <th scope="col" class="">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td scope="col">
                {{ $loop->iteration + ($books->currentPage() - 1) * $books->perPage() }}
            </td>
            <td scope="col">{{ $book->name }}</td>
            <td scope="col">{{ $book->author }}</td>
            <td scope="col">{{ $book->category }}</td>
            <td scope="col">{{ $book->year }}</td>
            <td scope="col">{{ $book->quantity }}</td>
            <td scope="col" class="d-flex">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-success me-1"><i class="bi bi-pencil"></i> Sửa</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$book->id}}">
                    <i class="bi bi-trash3"></i> Xóa
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa sách</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xóa sách này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <form action="{{route('books.destroy',$book->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xác nhận</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>


        </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center ">
    {{ $books->links() }}
</div>
@endsection