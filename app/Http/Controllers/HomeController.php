<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        if($user->isAdmin){
            return redirect()->route('admin.dashboard');
        }else if(!$user->isAdmin && $user->isAdjoint){
            return redirect()->route('adjoint.dashboard');
        }else{
            return redirect()->route('client.index');
        }


        //return view('home');
    }
}
