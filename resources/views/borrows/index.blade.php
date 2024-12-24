@extends('layout.userlayout')
@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="container">
    <h1 class = 'text-center text-primary'>Mượn trả sách</h1>
    <a href="{{ route('borrows.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i></i>Thêm mới</a>
    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Người mượn</th>
                <th>Sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
                <tr>
                    <td scope="col">
                        {{ $loop->iteration + ($borrows->currentPage() - 1) * $borrows->perPage() }}
                    </td>
                    <td>{{ $borrow->reader->name }}</td>
                    <td>{{ $borrow->book->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>
                        @if($borrow->status)
                            <span class="badge bg-success">
                                <i class="fas fa-check-circle"></i> Trả
                            </span>
                        @else
                            <span class="badge" style="background-color: #87CEEB; color: #000;">
                                <i class="fas fa-exclamation-circle"></i> Mượn
                            </span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info btn-sm">Chi tiết</a>
                        <form action="{{ route('borrows.return', $borrow->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success btn-sm">Trả sách</button>
                        </form>
                        {{-- <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Cập nhật</a> --}}
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" 
                                onclick="setDeleteAction('{{ route('borrows.destroy', $borrow->id) }}')">
                            Xóa
                        </button>
                    </td>
                    <td>
                        <a href="{{ route('borrows.history', $borrow->reader->id) }}" class="btn btn-info btn-sm">Lịch sử</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center ">
        {{ $borrows->links() }}
    </div>
</div>
<!-- Modal Xác Nhận Xóa -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Xác nhận xóa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Bạn có chắc chắn muốn xóa bản ghi này không?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Xóa</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function setDeleteAction(actionUrl) {
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = actionUrl;
    }
</script>
@endsection