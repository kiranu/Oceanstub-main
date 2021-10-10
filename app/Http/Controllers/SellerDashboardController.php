<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerDashboardController extends Controller
{
    /*public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:seller')->except('logout');
       
    }*/
    public function index()
    {
        return view('seller.dashboard');
    }
}
