<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContohController extends Controller
{
    public function TampilContoh()
    {
        $data = [
            'totalProducts'=> 310,
            'salesToday'=> 100,
            'totalRevenue'=> 'Rp 50,000,000',
            'registeredUser'=> 350,
        ];
        return view ('contoh', $data);
    }
}
