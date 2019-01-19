<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SSO\SSO;

class TestController extends Controller
{
    public function login(){
        if(!SSO::check()){
            SSO::authenticate();
        } else {
            return redirect('home');
        }
    }

    public function home(){
        if(!SSO::check()){
            SSO::authenticate();
        }
        $user = SSO::getUser();
        //dd($user);
        return view('home')->with('user',$user);
    }

    public function admin(){
        echo 'Anda adalah admin';
    }

    public function member(){
        echo 'anda adalah member';

    }
}
