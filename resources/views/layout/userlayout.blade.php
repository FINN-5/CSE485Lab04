<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>@yield('title')</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        main {
            flex: 1;
        }

        footer {
            background-color: #f8f9fa;
            padding: 1px;
        }

        button {
            padding: 4px;
        }
    </style>
</head>

<body>
    <header class="bg-dark sticky-top">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{route('home.index')}}">
                    <i class="bi bi-book-half"></i> Quản lý thư viện
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('books.index') }}">
                                <i class="bi bi-book"></i> Quản lý sách
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('readers.index') }}">
                                <i class="bi bi-people"></i> Quản lý độc giả
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('borrows.index') }}">
                                <i class="bi bi-journal-check"></i> Quản lý mượn trả
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle text-white" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle"></i> @yield('username')
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="#">Hồ sơ</a></li>
                            <li><a class="dropdown-item" href="#">Cài đặt</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="">Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>


    <main>
        @yield('main')
    </main>


    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <!-- Liên kết nhanh -->
                <div class="col-md-4">
                    <h5>Liên kết nhanh</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{route('home.index')}}" class="text-light text-decoration-none">Trang chủ</a></li>
                        <li><a href="{{ route('books.index') }}" class="text-light text-decoration-none">Quản lý sách</a></li>
                        <li><a href="{{ route('readers.index') }}" class="text-light text-decoration-none">Quản lý độc giả</a></li>
                        <li><a href="{{ route('borrows.index') }}" class="text-light text-decoration-none">Quản lý mượn trả</a></li>
                    </ul>
                </div>

                <!-- Thông tin liên hệ -->
                <div class="col-md-4">
                    <h5>Thông tin liên hệ</h5>
                    <p><i class="bi bi-geo-alt-fill"></i> 175 Tây Sơn, Hà Nội, Việt Nam</p>
                    <p><i class="bi bi-envelope-fill"></i> support@library.com</p>
                    <p><i class="bi bi-telephone-fill"></i> +84 123 456 789</p>
                </div>

                <!-- Giới thiệu -->
                <div class="col-md-4">
                    <h5>Về chúng tôi</h5>
                    <p>Hệ thống quản lý thư viện giúp bạn dễ dàng quản lý sách, độc giả và hoạt động mượn trả sách một cách hiệu quả.</p>
                    <div class="social-icons">
                        <a href="#" class="text-light me-2"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-light me-2"><i class="bi bi-twitter"></i></a>
                        <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>

            <hr class="bg-light">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 Hệ thống quản lý thư viện. Mọi quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

