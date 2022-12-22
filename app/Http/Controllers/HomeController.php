<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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


    public function admin()
    {
        return view('adminHome');
    }
    public function superAdmin()
    {
        return view('superAdmin');
    }
    public function readonlyAdmin()
    {
        return view('readonlyAdmin');
    }
    public function operatorAdmin()
    {
        return view('operatorAdmin');
    }
}
