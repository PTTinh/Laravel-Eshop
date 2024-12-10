<!DOCTYPE html>
<html lang="en">

@include('include._head')

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="btn-group d-none d-lg-block">
                @if (Auth::check() === true)
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                        data-bs-display="static" aria-expanded="false">
                        <img src="https://anhcuoiviet.vn/wp-content/uploads/2022/11/avatar-dep-dang-yeu-nu-5.jpg" alt="User Avatar" class="rounded-circle" width="30" height="30">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end">
                        <li>
                            <p class="dropdown-item">{{ Auth::user()->name }}</p>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Đăng xuất</a></li>
                    </ul>
                @else
                    <a href="{{ route('register') }}" class="btn btn-outline-success mt-1">Đăng ký</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-success mt-1">Đăng nhập</a>
                @endif
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar " style="min-height: 100vh">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#productCateSubmenu" data-bs-toggle="collapse"
                                aria-expanded="false">
                                Danh mục
                            </a>
                            <ul class="collapse list-unstyled" id="productCateSubmenu">
                                <li>
                                    <a class="nav-link ms-2" href="{{ route('product_cate.index') }}">Danh sách</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="nav-link active" href="#productSubmenu" data-bs-toggle="collapse"
                                aria-expanded="false">
                                Sản phẩm
                            </a>
                            <ul class="collapse list-unstyled" id="productSubmenu">
                                <li>
                                    <a class="nav-link ms-2" href="{{ route('product.index') }}">Danh sách</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @include('include._error')
                @include('include._alert')
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ $attributes['title'] ?? 'tiêu đề' }}</h1>
                </div>
                {{ $slot }}
            </main>
            <footer>

            </footer>
        </div>
    </div>
    <script src="{{ asset('lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>

    {{ $script ?? '' }}
</body>

</html>
