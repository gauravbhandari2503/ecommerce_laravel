<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('auth.login');
        } 
        return view('seller.dashboard');
    }
}