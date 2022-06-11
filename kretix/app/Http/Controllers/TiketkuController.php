<?php

namespace App\Http\Controllers;
use App\Models\Tiket;
use App\Models\User;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TiketkuController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $user = User::where('id', Auth::user()->id)->first();
        $pesananku = Pemesanan::where('user_id', Auth::user()->id)->get();
        if(!$pesananku->isEmpty()){
        $today = Carbon::today();
        for($k=0; $k<count($pesananku); $k++){
        $idpesan[$k] = $pesananku[$k]->id;
        }
        for($k=0; $k<count($pesananku); $k++){
        $id_tiket[$k] = $pesananku[$k]->id_tiket;
        }
        for($k=0; $k<count($pesananku); $k++){
        $tiketku = Tiket::where('id', $id_tiket[$k])->first();
        $idtik[$k] = $tiketku;
        }
        for($k=0; $k<count($pesananku); $k++){
        $diff[$k] = $today->diffInDays($pesananku[$k]->tanggal_berangkat, false)+1;
        }
        return view(
                'tiketku',
                [
                    "tiket" => $idtik,
                    "id_pesan" => $idpesan,
                    "diff" => $diff,
                ]
            );
        }
        elseif($user->hasRole('admin')){
            return redirect('/daftarpemesanan');
        }
        else{   
            alert()->error('Belum pernah memesan tiket, silahkan pesan tiket', 'Maaf');
            return redirect('/');
        }    
    }
}
