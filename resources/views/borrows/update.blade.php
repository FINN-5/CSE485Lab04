@extends('layout.userlayout')
@section('content')
<div class="container" style="height: 70vh;">
    <h1 class='text-primary'>Cập nhật</h1>
    <form action="{{ route('borrows.update', $borrow->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="book_id">ID người mượn: </label>
            <input type="text" class="form-control" id="book_id" name="book_id" value="{{ $borrow->book_id }}" required>
        </div>
        <div class="form-group">
            <label for="reader_id">ID sách: </label>
            <input type="text" class="form-control" id="reader_id" name="reader_id" value="{{ $borrow->reader_id }} "required>
        <div class="form-group">
            <label for="borrow_date">Ngày mượn</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrow->borrow_date }}">
        </div>
        <div class="form-group">
            <label for="return_date">Ngày trả</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrow->return_date }}">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" id="status" name="status" {{ $borrow->status ? '' : 'checked' }}>
            <label class="form-check-label" for="status">Mượn</label>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection