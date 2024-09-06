<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() 
    {
        return view('login.index');
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if(!Auth::attempt($credentials)) {
            redirect()->back()->withErrors(['Usuário ou senha incorretos!']);
        }

        return to_route('series.index');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
