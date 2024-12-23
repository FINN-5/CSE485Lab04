@extends('layout.userlayout')

@section('content')
<div class="container" style="height: 70vh;">
    <h1 class='text-primary'>Chi tiết mượn trả</h1>
    <p><strong>ID người mượn:</strong> {{ $borrow->reader_id }}</p>
    <p><strong>Tên người mượn:</strong> {{ $borrow->reader->name }}</p>
    <p><strong>ID sách:</strong> {{ $borrow->book_id }}</p>
    <p><strong>Tên sách:</strong> {{ $borrow->book->name }}</p>
    <p><strong>Ngày mượn:</strong> {{ $borrow->borrow_date }}</p>
    <p><strong>Ngày trả:</strong> {{ $borrow->return_date }}</p>
    <p><strong>Trạng thái:</strong> {{ $borrow->status ? 'Trả' : 'Mượn' }}</p>
    <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>

</div>
@endsection