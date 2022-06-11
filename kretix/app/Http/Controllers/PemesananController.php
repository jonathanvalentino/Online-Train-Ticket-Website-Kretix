<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index(Request $rq){
        $tanggal = $rq->tanggal;
        $dewasa = $rq->dewasa;
        $bayi = $rq->bayi;
        $hari = $rq->hari;
        $id = $rq->id;
        $penumpang1 = $rq->penumpang1;
        $penumpang2 = $rq->penumpang2;
        $penumpang3 = $rq->penumpang3;
        $penumpang4 = $rq->penumpang4;
        $nik1 = $rq->nik1;
        $nik2 = $rq->nik2;
        $nik3 = $rq->nik3;
        $nik4 = $rq->nik4;
        $tiket = Tiket::where('id', $id)->first();
         return view(
                'pembayaran',
                [
                    "tiket" => $tiket,
                    "tanggal" => $tanggal,
                    "dewasa" => $dewasa,
                    "bayi" => $bayi,
                    "hari" => $hari,
                    "penumpang1"=> $penumpang1,
                    "penumpang2" =>$penumpang2,
                    "penumpang3" =>$penumpang3,
                    "penumpang4" =>$penumpang4,
                    "nik1"=> $nik1,
                    "nik2"=> $nik2,
                    "nik3"=> $nik3,
                    "nik4"=> $nik4,
                ]
            );    
    }

    public function buatpesan(Request $rq){
        $tanggal = Carbon::createFromFormat('m/d/Y', $rq->tanggal)->format('Y-m-d');
        $dewasa = $rq->dewasa;
        $bayi = $rq->bayi;
        $hari = $rq->hari;
        $id = $rq->id;
        $penumpang1 = $rq->penumpang1;
        $penumpang2 = $rq->penumpang2;
        $penumpang3 = $rq->penumpang3;
        $penumpang4 = $rq->penumpang4;
        $nik1 = $rq->nik1;
        $nik2 = $rq->nik2;
        $nik3 = $rq->nik3;
        $nik4 = $rq->nik4;
        $create = Carbon::now()->toDateTimeString();
        $update = Carbon::now()->toDateTimeString();
        $tiket = Tiket::where('id', $id)->first();
        $total = $tiket->harga*$dewasa;
        DB::table('pemesanan')->insert(
            [
                'id_tiket'=> $id,
                'user_id' => Auth::user()->id,
                'nama_pemesan' => Auth::user()->name,
                'jumlah_orang' => $dewasa,
                'nama_kereta'=> $tiket->nama_kereta,
                'jenis_kereta'=> $tiket->jenis,
                'asal'=> $tiket->asal,
                'tujuan'=> $tiket->tujuan,
                'tanggal_berangkat'=> $tanggal,
                'jam_berangkat'=> $tiket->berangkat,
                'harga'=> $tiket->harga,
                'total_harga'=> $total,
                'nama1'=> $penumpang1,
                'nama2'=> $penumpang2,
                'nama3'=> $penumpang3,
                'nama4'=> $penumpang4,
                'nik1'=> $nik1,
                'nik2'=> $nik2,
                'nik3'=> $nik3,
                'nik4'=> $nik4,
                'created_at' => $tanggal,
                'updated_at' => $tanggal,
            ]
            );
            
            $GA = 'GA'.$hari;
            $GB = 'GB'.$hari;
            $GC = 'GC'.$hari;
            if($tiket->jenis=='Ekonomi'){
                DB::table('tiket')->where('id', $id)->update(
                [
                    'GA'.$hari => ($tiket->$GA)-$dewasa,
                ]
                );
            }
            elseif($tiket->jenis=='Bisnis'){
                DB::table('tiket')->where('id', $id)->update(
                [
                    'GB'.$hari => ($tiket->$GB)-$dewasa,
                ]
                );
            }
            elseif($tiket->jenis=='Eksekutif'){
                DB::table('tiket')->where('id', $id)->update(
                [
                    'GC'.$hari => ($tiket->$GC)-$dewasa,
                ]
                );
            }
            alert()->success('Pembayaran berhasil! Silahkan lihat tiket / cetak invoice', 'Sukses');
           return redirect('tiketku');
    }
}
