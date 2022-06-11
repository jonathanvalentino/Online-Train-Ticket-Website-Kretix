<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function invoice($id)
    {
        $datainvoice = Pemesanan::where('id', $id)->first();
        $tiket = Tiket::where('id', $datainvoice->id_tiket)->first();
    	return view('invoice', ['datainvoice' => $datainvoice], ['tiket' => $tiket]);
    }
}