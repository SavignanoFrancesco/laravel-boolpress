<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }
    //
    public function accountInfo()
    {
        return view('admin.account_info.account_info');
    }
    //
    public function tokenGenerator()
    {
        //generazione di 80 caratteri random
        $generated_api_token = Str::random(80);

        //recupero l'utente loggato al momento
        $user = Auth::user();

        //assegno il token generato al token della riga dell'utente autenticato/loggato
        $user->api_token = $generated_api_token;

        //salvo nel database
        $user->save();

        //
        return redirect()->route('admin.account_info');

    }
}
