@extends("Layout.template")
@if (session('berhasil'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Selamat!</strong> {{session("berhasil")}}.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
@section('content')
    <!-- Header -->
    <header style="display:flex; justify-content:space-between">
        <div>
            <h1>Daftar Produk</h1>
            <p>Temukan produk terbaik untuk kebutuhan anda</p>
        </div>
        <div>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Product
            </button>
        </div>
    </header>

    <header style="display: flex; justify-content:space-between">
    <div class="d-flex gap-4">
<!-- Product Card 1 -->
@foreach ($produk as $item)
<div class="product-card">
    <img src="{{ url('storage/public/images/' . $item->image) }}" alt="Produk 1">
    <h3>{{$item->nama_produk}}</h3>
    <p class="price">{{$item->harga}}</p>
    <p class="description">{{$item->deskripsi}}</p>
    <a href="/produk/upd/{{$item->kode_produk}}" class="btn btn-primary">Edit</a>
    {{-- <button class="cancel-to-cart"> Delete </button> --}}
    <form action="{{url('produk/delete/'.$item->kode_produk)}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class=" btn btn-danger">Delete</button>
    </form>
</div>
@endforeach
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{url('/produk/add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_produk">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input type="text" name="deskripsi" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jumlah_produk">Jumlah Produk</label>
                <input type="text" name="jumlah_produk" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="image">Gambar</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>
@endsection
