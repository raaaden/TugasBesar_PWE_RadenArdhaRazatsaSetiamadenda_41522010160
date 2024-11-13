<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\produk;
use App\Policies\ProdukPolicy;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContohController extends Controller
{
    public function TampilContoh()
    {
        // $data = [
        //     'totalProducts'=> 310,
        //     'salesToday'=> 100,
        //     'totalRevenue'=> 'Rp 50,000,000',
        //     'registeredUser'=> 350,
        // ];
        // return view ('contoh', $data);

        // $produkPerHari = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
        $isAdmin = Auth::user()->role === 'admin';
        $produkPerHariQuery = Produk::selectRaw('DATE(created_at) as date, COUNT(*) as total')
        ->groupBy('date')
        ->orderBy('date','asc');
        // ->get();

        if (!$isAdmin){
            $produkPerHariQuery->where('user_id', Auth::id());
        }
        $produkPerHari = $produkPerHariQuery->get();

        $totalProductsQuery = Produk::query();
        if (!$isAdmin){
            $totalProductsQuery->where('user_id', Auth::id());
        }

        $dates = [];
        $totals = [];

        foreach ($produkPerHari as $item) {
            $dates[] = Carbon::parse($item->date)->format('Y-m-d');
            $totals[] = $item->total;
        }

        $chart = LarapexChart::barChart()
        ->setTitle('Produk Ditambahkan Per Hari')
        ->setSubtitle('Data Penambahan Produk Harian')
        ->addData('Jumlah Produk', $totals)
        ->setXAxis($dates);

        $data = [
            'totalProducts'=> Produk::count(),
            'salesToday'=> 130,
            'totalRevenue'=> 'Rp 75,000,000',
            'registeredUser'=> 350,
            'chart' => $chart
        ];
        return view ('contoh', $data);
    }
}
