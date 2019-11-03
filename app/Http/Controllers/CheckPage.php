<?php

namespace App\Http\Controllers;

use App\Clients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CheckPage extends Controller
{
    public function GetCheck()
    {
        if (!Auth::check() ) {
            return view('login');
        } else {
            if (Auth::user()->status=='3') {

                $user_id=Auth::user()->id;

                $client=Clients::where('user_id',$user_id)->first();

                return view('check')->with('client',$client);
            }
            else {

                return redirect('/');
            }
        }
    }
}
