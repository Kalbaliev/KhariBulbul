<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalPage extends Controller
{
    public function getPersonals()
    {

        if (!Auth::check()) {
            return view('login');
        } else {

            $personals = Personal::where('p_or_e', 0)->get();


            return view('personals')->with('personals', $personals);

        }
    }
        public function getEmployees()
        {

            if (!Auth::check()) {
                return view('login');
            } else {
            $employees = Personal::where('p_or_e', 1)->get();
            return view('employees')->with('employees', $employees);
        }
    }



    public function PostSortEmployee(Request $request){
        if (!Auth::check()) {
            return view('login');
        } else {
            $floor = $request->floor;
            if ($floor != 0) {

                $sort_employees = Personal::where('floor', $floor)->where('p_or_e', 1)->get();
            } else {

                $sort_employees = Personal::where('p_or_e', 1)->get();
            }

            return view('Employees_template')->with('sort_employees', $sort_employees);
        }
    }
    public function PostSortPersonal(Request $request){
        if (!Auth::check()) {
            return view('login');
        } else {
        $floor=$request->floor;
        if($floor!=0){

            $sort_personals=Personal::where('floor',$floor)->where('p_or_e',0)->get();
        }
        else{

            $sort_personals=Personal::where('p_or_e',0)->get();
        }

        return view('Personals_template')->with('sort_personals',$sort_personals);

    }}
}
