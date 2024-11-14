<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <title>{{ $attributes['title']??"tiêu đề" }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div> --}}
           
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar " style="min-height: 100vh">
                <div class="sidebar-sticky" >
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
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">{{ $attributes['title']??"tiêu đề" }}</h1>
                </div>
                {{ $slot }}
            </main>
            <footer>

            </footer>
        </div>
    </div>
    <script src="{{ asset('lib/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>

   {{ $script??"" }}
</body>

</html>
