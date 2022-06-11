<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('profile',compact('user'));
    }

    public function ubahsandi(Request $request)
    {
        $this->validate($request, [
            'password'  => 'confirmed',
        ]);
        $user = User::where('id', Auth::user()->id)->first();
        
        if(!empty($request->password))
    	{
    		$user->password = Hash::make($request->password);
    	}
        $user->update();
        alert()->success('Password berhasil diganti', 'Sukses');
        return view('profile',compact('user'));
    }
    public function ubahfoto(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        // if($user->foto != "fotodefault.png"){
        //     File::delete(public_path('fotoprofil/'.$user->foto));
        //     } //ini berhasil tapi ga guna untuk kasus ini
        
        $file = $request->file('gambar');
        if(empty($file)){
            return redirect('profile');
        }
        $gambarupload = $user->id . '.png';
        $file->move(\base_path() ."/public/fotoprofil", $gambarupload);
        if(!empty($request))
    	{   
    		$user->foto = $gambarupload;
    	}
        $user->update();
        alert()->success('Foto profil berhasil diganti', 'Sukses');
        return redirect('profile');
    }
    public function ubahnama(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        if(!empty($request))
    	{
            if($user->name == $request->name){
                return view('profile',compact('user'));
            }
    		$user->name = $request->name;
    	}
        $user->update();
        alert()->success('Profil berhasil diganti', 'Sukses');
        return view('profile',compact('user'));
    }
}
