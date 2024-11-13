@extends("Layout.template")
@section('content')
    <header style="display:flex; justify-content:space-between">
        <div>
            <h1>Update Produk</h1>
        </div>
    </header>
    <div>
        <div class="container">
            <h1>Update Data Produk</h1>
            @foreach ($produkupd as $item )
            <form action="{{ url(Auth::user()->role.'/produk/upd')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="kode_produk" value="{{$item->kode_produk }}">
                <div class="form-group">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" name="nama_produk" class="form-control" value="{{$item->nama_produk}}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" value="{{$item->deskripsi}}" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Harga</label>
                    <input type="number" name="harga" class="form-control" value="{{$item->harga}}" required>
                </div>

                <div class="form-group">
                    <label for="jumlah_produk">Jumlah Produk</label>
                    <input type="text" name="jumlah_produk" value="{{$item->jumlah_produk}}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Update produk</button>
            </form>
            @endforeach
        </div>
    </div>

@endsection
