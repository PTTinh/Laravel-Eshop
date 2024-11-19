<header class="col-12">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="#" alt="ESHOP-LOGO" class="d-inline-block align-top">
            </a>
            <div>
                {{-- Search --}}
                <button class="btn btn-outline-success d-lg-none" type="button" data-bs-toggle="modal"
                    data-bs-target="#searchModal">
                    <i class='bx bx-search-alt'></i>
                </button>
                <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="searchModalLabel">Search</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search"
                                        aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit"><i
                                            class='bx bx-search-alt'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Cart --}}
                {{-- <button class="btn btn-outline-success d-lg-none" type="button">
                    <i class='bx bx-cart-alt'></i>
                </button> --}}
                <a href="{{ route('cart') }}" class="btn btn-outline-success d-lg-none"><i class='bx bx-cart-alt'></i></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNav" aria-labelledby="offcanvasRightLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasRightLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 p-1">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Trang Chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên Hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Giới Thiệu</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <hr class="w-100">
                            <div class="d-flex flex-column align-items-start">
                                @if (Auth::check() === true)
                                    <p class="mb-0">{{ Auth::user()->name }}</p>
                                    <a class="nav-link" href="{{ route('logout') }}">Đăng xuất</a>
                                @else
                                    <div class="d-flex">
                                        <a class="nav-link" href="{{ route('login') }}">Đăng nhập/</a>
                                        <a class="nav-link" href="{{ route('register') }}">Đăng ký</a>
                                    </div>
                                @endif
                            </div>
                        </li>

                    </ul>
                    <form class="d-flex h-50 mt-2" role="search">
                        <input class="form-control me-2 d-none d-lg-block" type="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-success me-2 d-none d-lg-block" type="submit"><i
                                class='bx bx-search-alt'></i></button>
                       {{--  <button class="btn btn-outline-success d-none d-lg-block me-2" type="button">
                            <i class='bx bx-cart-alt'></i>
                        </button> --}}
                        <a href="{{ route('cart') }}" class="btn btn-outline-success d-none d-lg-block me-2"><i class='bx bx-cart-alt'></i></a>
                    </form>
                    <div class="btn-group d-none d-lg-block">
                        @if (Auth::check() === true)
                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">
                                <img src="https://anhcuoiviet.vn/wp-content/uploads/2022/11/avatar-dep-dang-yeu-nu-5.jpg"
                                    alt="User Avatar" class="rounded-circle border border-primary " width="30"
                                    height="30">
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
            </div>
        </nav>
</header>
