<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;


class SellerProfileController extends Controller
{
    public function index(){
        if (!Auth::check()) {
            return view('login');
        } 
        $usersInfo = DB::table('users')->where('email',Auth::user()->email)->first();
        return view('seller.profilepage',['users' => $usersInfo]);
    }

    public function update_avatar(Request $request){
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg',
        ]);
    
        $userData = Auth::user();

        $avatarName = $userData->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName,'public');

        $userData->avatar = $avatarName;
        $userData->save();
        return redirect()->back()->with('message','Image Uploaded Successfully');
}
}