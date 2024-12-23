@extends('layout.userlayout')

@section('content')
<div class="container" style="height: 70vh;">
    <h1 class='text-primary'>Thêm mới</h1>
    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="book_id">ID người mượn: </label>
            <input type="text" class="form-control" id="book_id" name="book_id" required>
        </div>
        <div class="form-group">
            <label for="reader_id">ID sách: </label>
            <input type="text" class="form-control" id="reader_id" name="reader_id" required>
        <div class="form-group">
            <label for="borrow_date">Ngày mượn</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="return_date">Ngày trả</label>
            <input type="date" name="return_date" id="return_date" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

<script>
    // Lấy ngày hôm nay
    const today = new Date();
    const formattedToday = today.toISOString().split('T')[0]; // Chuyển đổi sang định dạng yyyy-mm-dd

    // Lấy ngày trả (5 tháng sau)
    const returnDate = new Date();
    returnDate.setMonth(returnDate.getMonth() + 5); // Thêm 5 tháng
    const formattedReturnDate = returnDate.toISOString().split('T')[0];

    // Gán giá trị mặc định cho các trường
    document.getElementById('borrow_date').value = formattedToday;
    document.getElementById('return_date').value = formattedReturnDate;
</script>
@endsection