<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DetailController extends Controller
{
    public function index(Request $rq){
        if((!Auth::guest())){
        $tanggal = $rq->tanggal;
        $dewasa = $rq->dewasa;
        $bayi = $rq->bayi;
        $hari = $rq->hari;
        $id = $rq->id;

        $tiket = Tiket::where('id', $id)->first();
        return view(
                'detail',
                [
                    "tiket" => $tiket,
                    "tanggal" => $tanggal,
                    "dewasa" => $dewasa,
                    "bayi" => $bayi,
                    "hari" => $hari,
                ]
            );    
        }
        else{
            return redirect('login');
        }
    }
}
