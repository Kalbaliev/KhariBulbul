<?php

namespace App\Http\Controllers;

use App\Innovations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InnovationsPage extends Controller
{
    public function getInnovations(){

        if (!Auth::check()) {
            return view('login');
        } else {

        $innovations=Innovations::orderBy('id', 'desc')->get();

        return view('innovations')->with('innovations',$innovations);

    }
    }
}
