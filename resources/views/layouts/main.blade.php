<!DOCTYPE html>
<html>
<head>
    <title>Marketplace Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f0f7f0;
        }

        .navbar {
            background: #1b8f2f !important;
        }

        .navbar .nav-link, .navbar-brand {
            color: white !important;
        }

        .navbar .nav-link:hover {
            color: #d9ffd9 !important;
        }

        footer {
            background: #1b8f2f;
            color: white;
            padding: 15px;
            margin-top: 40px;
            text-align: center;
        }

        .card {
            border-radius: 10px;
            overflow: hidden;
            border: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background: #ffffff;
        }

        .card img {
            height: 180px;
            object-fit: cover;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .btn-primary {
            background: #1b8f2f;
            border: none;
        }

        .btn-primary:hover {
            background: #0f5f1f;
        }

        .list-group-item.active {
            background: #1b8f2f !important;
            border-color: #1b8f2f !important;
        }

        .list-group-item:hover {
            background: #e8fbe8;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success px-4 shadow-sm">
    <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">
        Marketplace
    </a>

    <!-- Toggle Mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

        <!-- Left Menu -->
        <ul class="navbar-nav me-auto ms-4">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}"
                   href="{{ url('/') }}">Beranda</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('produk*') ? 'active fw-bold' : '' }}"
                   href="{{ url('/produk') }}">Produk</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('toko*') ? 'active fw-bold' : '' }}"
                   href="{{ url('/toko') }}">Toko</a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->is('keranjang') ? 'active fw-bold' : '' }}"
                   href="{{ url('/keranjang') }}">
                    Keranjang <i class="bi bi-cart"></i>
                </a>
            </li>
        </ul>

        <!-- Search -->
        <form action="{{ url('/produk') }}" method="GET" class="d-flex me-3 w-25">
            <input type="text" name="q" class="form-control form-control-sm"
                   placeholder="Cari produk..." value="{{ request('q') }}">
        </form>

        <!-- Right -->
        <ul class="navbar-nav">
            @guest
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @else
                <li class="nav-item">
                    <span class="nav-link">Hi, {{ auth()->user()->nama }}</span>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST">@csrf
                        <button class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @endguest

        </ul>
    </div>
</nav>


    <div class="container mt-4">
        @yield('content')
    </div>

    <footer>
        © {{ date('Y') }} Marketplace Sekolah
    </footer>
</body>
</html>
