<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
   public function search(Request $request){
       $users = User::get();//すべて取得
    if (!empty($request->keyword)) {
        $users = User::where('username','like',"%$request->keyword%")->get();//あいまい検索
    }

        return view('users.search',['users'=>$users]);
    }

}
