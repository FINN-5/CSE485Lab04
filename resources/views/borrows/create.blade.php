@extends('layout.userlayout')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container" style="height: 70vh;">
    <h1 class='text-primary'>Thêm mới</h1>
    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <!-- Tìm kiếm tên người dùng -->
        <div class="form-group position-relative">
            <label for="reader_name">Tên người mượn:</label>
            <input type="text" class="form-control" id="reader_name" name="reader_name" autocomplete="off" required>
            <input type="hidden" id="reader_id" name="reader_id"> <!-- Lưu ID ẩn -->
            <div id="readerSuggestions" class="list-group position-absolute" style="z-index: 1000;"></div>
        </div>

        <!-- Tìm kiếm tên sách -->
        <div class="form-group position-relative">
            <label for="book_name">Tên sách:</label>
            <input type="text" class="form-control" id="book_name" name="book_name" autocomplete="off" required>
            <input type="hidden" id="book_id" name="book_id"> <!-- Lưu ID ẩn -->
            <div id="bookSuggestions" class="list-group position-absolute" style="z-index: 1000;"></div>
        </div>

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
    document.getElementById('reader_name').addEventListener('input', function () {
        const query = this.value;
        if (query.length >= 2) {
            fetch(`/api/readers/search-by-name?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    const suggestions = document.getElementById('readerSuggestions');
                    suggestions.innerHTML = '';
                    data.forEach(item => {
                        const suggestion = document.createElement('a');
                        suggestion.href = '#';
                        suggestion.className = 'list-group-item list-group-item-action';
                        suggestion.textContent = `${item.name} (ID: ${item.id})`;
                        suggestion.addEventListener('click', function (e) {
                            e.preventDefault();
                            document.getElementById('reader_name').value = item.name;
                            document.getElementById('reader_id').value = item.id; // Lưu ID vào input ẩn
                            suggestions.innerHTML = '';
                        });
                        suggestions.appendChild(suggestion);
                    });
                });
        }
    });

    document.getElementById('book_name').addEventListener('input', function () {
        const query = this.value;
        if (query.length >= 2) {
            fetch(`/api/books/search-by-title?q=${query}`)
                .then(response => response.json())
                .then(data => {
                    const suggestions = document.getElementById('bookSuggestions');
                    suggestions.innerHTML = '';
                    data.forEach(item => {
                        const suggestion = document.createElement('a');
                        suggestion.href = '#';
                        suggestion.className = 'list-group-item list-group-item-action';
                        suggestion.textContent = `${item.name} (ID: ${item.id})`;
                        suggestion.addEventListener('click', function (e) {
                            e.preventDefault();
                            document.getElementById('book_name').value = item.name;
                            document.getElementById('book_id').value = item.id; // Lưu ID vào input ẩn
                            suggestions.innerHTML = '';
                        });
                        suggestions.appendChild(suggestion);
                    });
                });
        }
    });
</script>
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

