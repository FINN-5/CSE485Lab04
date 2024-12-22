
@extends('layout.userlayout')
@section('title', 'Danh sách Độc giả')
@section('main')
<h3 class="text-center text-uppercase text-success my-3">Danh sách Độc giả</h3>
<a href="{{route('readers.create')}}" class='btn btn-success ms-1'><i class="bi bi-plus-circle"></i> Thêm độc giả mới</a>
@if (session('success'))
<div class="container">
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('success') }}
        <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
    </div>
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Ngày sinh</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col" class="">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($readers as $reader)
        <tr>
            <td scope="col">
                {{ $loop->iteration + ($readers->currentPage() - 1) * $readers->perPage() }}
            </td>
            <td scope="col">{{ $reader->name }}</td>
            <td scope="col">{{ $reader->birthday }}</td>
            <td scope="col">{{ $reader->address }}</td>
            <td scope="col">{{ $reader->phone }}</td>
            <td scope="col" class="d-flex">
                <a href="{{ route('readers.edit', $reader->id) }}" class="btn btn-success me-1"><i class="bi bi-pencil"></i> Sửa</a>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#{{$reader->id}}">
                    <i class="bi bi-trash3"></i> Xóa
                </button>
                <!-- Modal -->
                <div class="modal fade" id="{{$reader->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa độc giả</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có muốn xóa độc giả này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <form action="{{route('readers.destroy',$reader->id)}}" method="POST">
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
{{ $readers->links('pagination::bootstrap-4', ['class' => 'pagination pagination-sm']) }}
</div>
@endsection