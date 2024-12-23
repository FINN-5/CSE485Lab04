@extends('layout.userlayout')

@section('content')
<div class="container mt-5" style="height: 70vh;">
    <h1 class="text-center text-primary">Lịch sử mượn trả sách</h1>
    <h3 class="text-center text-success">Độc giả: {{ $reader->name }}</h3>

    @if($borrows->isEmpty())
        <p class="text-center">Độc giả này chưa có lịch sử mượn trả sách.</p>
    @else
        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên sách</th>
                    <th>Ngày mượn</th>
                    <th>Ngày trả</th>
                    <th>Trạng thái</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrow)
                    <tr>
                        <td>{{ $borrow->id }}</td>
                        <td>{{ $borrow->book->name }}</td> <!-- Đảm bảo 'name' đúng -->
                        <td>{{ $borrow->borrow_date }}</td>
                        <td>{{ $borrow->return_date }}</td>
                        <td>{{ $borrow->status == 1 ? 'Đã trả' : 'Đang mượn' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <div class="text-center mt-3">
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
</div>
@endsection