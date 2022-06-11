<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use SweetAlert;
use Carbon\Carbon;
use UxWeb\SweetAlert\SweetAlertServiceProvider;
use Illuminate\Support\Facades\Auth;

class PencarianController extends Controller
{
    
    public function index(Request $rq){
        $asal = $rq->asal;
        $tujuan = $rq->tujuan;
        $tanggal = $rq->tanggal_keberangkatan;
        $dewasa = $rq->dewasa;
        $bayi = $rq->bayi;
        $today = Carbon::today();
        $diff = $today->diffInDays($tanggal, false)+1;
        
        if($diff<1){
            alert()->error('Tanggal tidak valid', 'Maaf');
            return redirect('/');
        }
        if(!empty($asal)){
        $tiket = Tiket::latest()->where('asal', $asal)->where('tujuan', $tujuan)->get();
        }

            $GA = 'GA'.$diff;
            $GB = 'GB'.$diff;
            $GC = 'GC'.$diff;
        foreach($tiket as $tkt){
            if($tkt->jenis=='Ekonomi'){
                $sisa = $tkt->$GA;
            }
            elseif($tkt->jenis=='Bisnis'){
                $sisa = $tkt->$GB;
            }
            elseif($tkt->jenis=='Eksekutif'){
                $sisa = $tkt->$GC;
            }
        }


        if(!$tiket->isEmpty()){
            return view(
                'pencarian',
                [
                    "asal" => $asal,
                    "tujuan" => $tujuan,
                    "tiket" => $tiket,
                    "tanggal" => $tanggal,
                    "dewasa" => $dewasa,
                    "bayi" => $bayi,
                    "hari" => $diff,
                    "sisa" => $sisa,
                ]
            );
        }
        else{
        alert()->error('Tiket tidak ditemukan', 'Maaf');
        return redirect('/');
        }
    }
}
