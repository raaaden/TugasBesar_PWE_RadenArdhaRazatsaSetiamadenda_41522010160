@extends("Layout.template")
@section("content")
    <header>
        <h1>Selamat Datang di Dashboard Penjualan</h1>
    </header>

    <!-- Stats Cards -->
    <div class="cards">
        <div class="card">
            <h3>Total Produk</h3>
            <p id="total-products">{{$totalProducts}}</p>
        </div>
        <div class="card">
            <h3>Penjualan Hari Ini</h3>
            <p id="sales-today">{{$salesToday}}</p>
        </div>
        <div class="card">
            <h3>Total Pendapatan</h3>
            <p id="total-revenue">Rp 50,000,000</p>
        </div>
        <div class="card">
            <h3>Pengguna Terdaftar</h3>
            <p id="registered-users">350</p>
        </div>
    </div>

    <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
    </div>

    <!-- Sales Chart -->
    <div id="chart">
        <h2>Grafik Penjualan Bulanan</h2>
        <canvas id="salesChart"></canvas>
    </div>
@endsection
