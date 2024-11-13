<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penjualan</title>
    <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="d-flex">

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard Penjualan</h2>
        <ul>
            {{-- <li><a href="{{url('contoh')}}">Home</a></li> --}}
            {{-- <li><a href="{{url('produk')}}">Produk</a></li> --}}
            {{-- <li><a href="#">Penjualan</a></li> --}}
            {{-- <li><a href="{{ url('laporan')}}">Laporan</a></li> --}}
            {{-- <li><a href="#">Pengaturan</a></li> --}}
            <li><a href="{{url(Auth::user()->role.'/contoh')}}">Home</a></li>
            <li><a href="{{url(Auth::user()->role.'/produk')}}">Produk</a></li>
            <li><a href="#">Penjualan</a></li>
            <li><a href="{{url(Auth::user()->role.'/laporan')}}">Laporan</a></li>
            <li><a href="#">Pengaturan</a></li>
            <li>
                <form action="{{url('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="text-decoration-none bg-transparent border-0 text-white" style="font-size:18px;">Logout</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="main-content">
        @yield("content")
    </div>
</div>
    <footer>
        <p>&copy; 2024 Aplikasi Penjualan Raden Ardha Razatsa S. All rights reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>
