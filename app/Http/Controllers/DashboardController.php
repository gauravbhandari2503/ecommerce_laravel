<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
{
    public function index(){
        return view('seller.dashboard');
    }

}