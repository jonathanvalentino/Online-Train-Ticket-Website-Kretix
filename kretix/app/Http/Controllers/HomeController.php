<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pemesanan;
use App\Models\Tiket;
use App\Charts\MonthlyUsersChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MonthlyUsersChart $chart)
    {
        if(!empty(Auth::user()->id)){
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('admin')){
        
            $tiket = Tiket::all();
            $pemesanan = Pemesanan::all();
            $user = User::whereRoleIs(['user'])->get();
            
            return view('dashboard', [
                
                "title" => "Dashboard",
                "tiket" => $tiket->count(),
                "pemesanan" => $pemesanan->count(),
                "user" => $user->count(),
                'chart' => $chart->build(),
                'chart1' => $chart->build1()
            ]);
            }

        elseif($user->hasRole('user')){
            return view('home');
        }
        }
        else{
            return redirect('/');
        }
    }
    public function pencariannav(){
        alert()->error('Harap cari terlebih dahulu', 'Maaf');
        return redirect('/');
    }
}
