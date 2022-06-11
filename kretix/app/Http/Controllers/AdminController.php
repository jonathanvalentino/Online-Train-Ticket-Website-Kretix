<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Pemesanan;
use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('admin')){
            $tiket = Tiket::latest();
            if (!empty(request('search'))) {
                $tiket->where('id', 'like', '%' . request('search') . '%')
                    ->orwhere('nama_kereta', 'like', '%' . request('search') . '%')
                    ->orwhere('jenis', 'like', '%' . request('search') . '%')
                    ->orwhere('berangkat', 'like', '%' . request('search') . '%')
                    ->orwhere('sampai', 'like', '%' . request('search') . '%')
                    ->orwhere('asal', 'like', '%' . request('search') . '%')
                    ->orwhere('tujuan', 'like', '%' . request('search') . '%');
            }
                return view(
                    'daftartiket',
                    [
                        "tiket" => $tiket->get(),
                        "search" => request(('search'))
                    ]
                );
        }
        else{
            return redirect('home');
        }
    }

    public function tambahekonomi() {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        //return view ke halaman tambah tiket ekonomi
        return view('tambahekonomi');
    }

    public function tambahbisnis() {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        //return view ke halaman tambah tiket bisnis
        return view('tambahbisnis');
    }

    public function tambaheksekutif() {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        //return view ke halaman tambah tiket eksekutif
        return view('tambaheksekutif');
    }

    public function uploadtiket(Request $req) {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        DB::table('tiket')->insert(
            [
                'nama_kereta' => $req->upnama_kereta,
                'jenis' => $req->upjenis,
                'asal' => $req->upasal,
                'tujuan' => $req->uptujuan,
                'berangkat' => $req->upberangkat,
                'sampai' => $req->upsampai,
                'harga' => $req->upharga,

                'GA1' => $req->upGA1,
                'GA2' => $req->upGA2,
                'GA3' => $req->upGA3,
                'GA4' => $req->upGA4,
                'GA5' => $req->upGA5,
                'GA6' => $req->upGA6,
                'GA7' => $req->upGA7,

                'GB1' => $req->upGB1,
                'GB2' => $req->upGB2,
                'GB3' => $req->upGB3,
                'GB4' => $req->upGB4,
                'GB5' => $req->upGB5,
                'GB6' => $req->upGB6,
                'GB7' => $req->upGB7,
                
                'GC1' => $req->upGC1,
                'GC2' => $req->upGC2,
                'GC3' => $req->upGC3,
                'GC4' => $req->upGC4,
                'GC5' => $req->upGC5,
                'GC6' => $req->upGC6,
                'GC7' => $req->upGC7,
            ]
        );
        //alert()->success('Postingan berhasil ditambahkan', 'Sukses');
        return redirect('daftartiket');
    }

    public function ubahtiket(Request $req) {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        $create = Carbon::now()->toDateTimeString();
        $update = Carbon::now()->toDateTimeString();
        $tiket = Tiket::where('id', $req->id)->first();
        if(!empty($req))
    	{
            $tiket->nama_kereta = $req->upnama_kereta;
            $tiket->jenis = $req->upjenis;
            $tiket->asal = $req->upasal;
            $tiket->tujuan = $req->uptujuan;
            $tiket->berangkat = $req->upberangkat;
            $tiket->sampai = $req->upsampai;
            $tiket->harga = $req->upharga;
            $tiket->GA1 = $req->upGA1;
            $tiket->GA2 = $req->upGA2;
            $tiket->GA3 = $req->upGA3;
            $tiket->GA4 = $req->upGA4;
            $tiket->GA5 = $req->upGA5;
            $tiket->GA6 = $req->upGA6;
            $tiket->GA7 = $req->upGA7;
            $tiket->GB1 = $req->upGB1;
            $tiket->GB2 = $req->upGB2;
            $tiket->GB3 = $req->upGB3;
            $tiket->GB4 = $req->upGB4;
            $tiket->GB5 = $req->upGB5;
            $tiket->GB6 = $req->upGB6;
            $tiket->GB7 = $req->upGB7;
            $tiket->GC1 = $req->upGC1;
            $tiket->GC2 = $req->upGC2;
            $tiket->GC3 = $req->upGC3;
            $tiket->GC4 = $req->upGC4;
            $tiket->GC5 = $req->upGC5;
            $tiket->GC6 = $req->upGC6;
            $tiket->GC7 = $req->upGC7;
            $tiket->created_at = $create;
            $tiket->updated_at = $update;
        }
        $tiket->update();
        return redirect('daftartiket');
    }

    public function hapustiket($id) {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        //$kosntrak = Kosntrak::where('id', $id)->first();
        //File::delete(public_path('images/'. $kosntrak->gambar));
        DB::table('tiket')->where('id', $id)->delete();
        return redirect('daftartiket');
    }

    public function daftaruser()    
        {
        $userr = User::where('id', Auth::user()->id)->first();
        if($userr->hasRole('user')){
            return redirect('home');
        }
        $users = User::get();
    	return view('daftaruser', ['users' => $users]);
        }

    public function ubahuser(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        $users = User::where('id', $request->id)->first();
        if(!empty($request))
    	{
    		$users->name = $request->name;
    	    $users->email = $request->email;
    	}
        $users->update();
        return redirect('/daftaruser');
    }

    public function hapususer(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if($user->hasRole('user')){
            return redirect('home');
        }
        DB::table('users')->where('id', $request->id)->delete();
        return redirect('/daftaruser');
    }

}