<?php

namespace App\Http\Controllers;

use http\Message;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function formLogin()
    {
        return view('auth.login');
    }
    function login(Request $request)
    {
        $user = [
            'email'=>$request->email,
            'password'=>$request->password
        ];
        if (Auth::attempt($user)){
            return redirect()->route('nations.list');
        }

        return back();

    }
//    function Constant()
//    {
//        if (Gate::allows('crud-user')){
//            return view();
//        }
//        abort(403, '');
//    }
}
