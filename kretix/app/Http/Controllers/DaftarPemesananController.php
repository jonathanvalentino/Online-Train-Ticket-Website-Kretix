<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DaftarPemesananController extends Controller
{

    public function index()
    {
        $pemesanan = Pemesanan::latest();
        if (!empty(request('search'))) {
            $pemesanan->where('nama_pemesan', 'like', '%' . request('search') . '%')
                ->orwhere('nama_kereta', 'like', '%' . request('search') . '%')
                ->orwhere('jumlah_orang', 'like', '%' . request('search') . '%')
                ->orwhere('jenis_kereta', 'like', '%' . request('search') . '%')
                ->orwhere('asal', 'like', '%' . request('search') . '%')
                ->orwhere('tujuan', 'like', '%' . request('search') . '%')
                ->orwhere('tanggal_berangkat', 'like', '%' . request('search') . '%');
            }
            
            return view(
                'daftarpemesanan',
                [
                    "pemesanan" => $pemesanan->get(),
                    "search" => request(('search'))
                ]
            );
        
    }
}
