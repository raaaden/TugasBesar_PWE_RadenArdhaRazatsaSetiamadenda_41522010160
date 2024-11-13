<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use Barryvdh\DomPDF\Facade\Pdf;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function ViewProduk()
    {
        // $produk = Produk::all(); //mengambil semua data di tabel produk
        $isAdmin = Auth::user()->role=='admin';
        $produk = $isAdmin ? Produk::all() : Produk::where('user_id', Auth::user()->id)->get();
        return view('produk', ['produk' => $produk]); //nenampilkan view dari produk.blade.php dengan membava variabel $produk
    }

    public function CreateProduk(Request $request)
    {
        // menambahkan variabel $filePath untuk mendefinisikan penyimpanan file
        $imageName = null;
        if ($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('public/images',$imageName);
        }

        Produk::create([
            'nama_produk'=> $request->nama_produk,
            'deskripsi'=> $request->deskripsi,
            'harga'=> $request->harga,
            'jumlah_produk'=> $request->jumlah_produk,
            'image'=> $imageName,
            'user_id'=> Auth::user()->id
        ]);

        // return redirect('/produk');
        return redirect(Auth::user()->role.'/produk');

        return redirect()->back()->with("berhasil","produk berhasil di tambahkan!");
    }
    public function ViewAddProduk()
    {
        return view('addproduk');
    }

    public function DeleteProduk($kode_produk)
    {
        produk::where('kode_produk', $kode_produk)->delete();

        return redirect(Auth::user()->role. '/produk')->with('berhasil','Data Berhasil Dihapus');
    }
    public function EditProduk(Request $request){
    $data=[
        "produkupd"=>produk::where("kode_produk",$request->kode_produk)->get(),
    ];
    return view("addproduk",$data);
    }
    public function updateProduct(Request $request){
        if ($request->hasFile('image')){
            $imageFile = $request->file('image');
            $imageName = time() . '_' . $imageFile->getClientOriginalName();
            $imageFile->storeAs('public/images',$imageName);
        }

        Produk::where([
            'nama_produk'=> $request->nama_produk,
            'deskripsi'=> $request->deskripsi,
            'harga'=> $request->harga,
            'jumlah_produk'=> $request->jumlah_produk,
            'image'=> $imageName,
            'user_id'=> Auth::user()->id
        ]);

    $updateprd=produk::find($request->kode_produk);
    $updateprd->nama_produk=$request->nama_produk;
    $updateprd->deskripsi=$request->deskripsi;
    $updateprd->harga=$request->harga;
    $updateprd->jumlah_produk=$request->jumlah_produk;
    $updateprd->image=$imageName;
    $updateprd->save();
    return redirect(Auth::user()->role.'/produk')->with('berhasil','Data Berhasil Diupdate');


    }

    public function ViewLaporan()
    {
        $products = Produk::all();
        return view('laporan', ['products'=> $products]);
    }

    public function print()
    {
        $products = Produk::all();

        $pdf = Pdf::loadView('report', compact('products'));

        return $pdf->stream('laporan-produk.pdf');
    }

}
