<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
        if (auth()->user()->role == 'karyawan')
        {
            return view('adminPage');
        }
        elseif (auth()->user()->role == 'manager') 
        {
            return view('adminPage');
        }
        else
        {
            return redirect(route('landingPage'));
        }
    }
}