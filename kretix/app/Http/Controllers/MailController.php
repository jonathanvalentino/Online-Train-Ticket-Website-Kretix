<?php

namespace App\Http\Controllers;
use App\Mail\KritikSaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function index(Request $request){
    if(!empty(Auth::user()->id)){
    $user = User::where('id', Auth::user()->id)->first();
	$details = [
    'username' => $user->name,
    'title' => 'Kritik dan saran dari '.$user->name,
    'body' => $request->get('message'),
    ];
   
    Mail::to('webkretix@gmail.com')->send(new \App\Mail\KritikSaran($details));
   
    return back()->with('success', 'Kami telah menerima pesan anda, terimakasih atas masukannya.');
    }
    else{
        return redirect('login');
    }
	}

}
