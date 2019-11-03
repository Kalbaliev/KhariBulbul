<?php

namespace App\Http\Controllers;


use App\Services_Log;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Mockery\Exception;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ServicesPage extends Controller
{


    function GetServices(){
        if (!Auth::check()) {
            return view('login');
        } else {

            if(Auth::user()->status=='9') {

                return view('services');
            }
            else{

                return redirect('/');
            }
            }
    }
    function PostServices(Request $request){

        $lang=\LaravelLocalization::setLocale();

        if($lang=='en'){
            $validateTitle="Oh Pity!";
            $validateText="Fill each cells, do not empty !";
            $ErrorTitle="Oh Pity!";
            $ErrorText="There is problem , Plese check information about reservation!";
            $SuccessTitle = "Congratulations!";
            $SuccessText = "Operation was completed successfully";

        }
        else if ($lang=='az') {

            $validateTitle = "Təəssüf!";
            $validateText = "Xanaların hər birini doldurun, boş saxlamayın !";
            $ErrorTitle = "Təəssüf!";
            $ErrorText = "Problem var, Xahiş olunur informasiyanı yoxlayasınız!";

            $SuccessTitle = "Təbriklər!";
            $SuccessText = "Əməliyyat uğurla başa çatdı";
        }



        if (!Auth::check()) {
            return view('login');
        }
        else {

            if (Auth::user()->status == '9') {

                if ($request->services_status == '0' || $request->services_status == '1') {
                    $validator = Validator::make($request->all(), [

                        'service_status' => 'required',
                        'check_in' => 'required',
                        'check_out' => 'required',
                        'messages' => 'required',
                        'people_number_human' => 'required',
                    ]);
                }
                else {
                    $validator = Validator::make($request->all(), [

                        'service_status' => 'required',

                        'messages' => 'required',
                        'people_number_human' => 'required',
                    ]);
                }

                if ($validator->fails()) {

                    return response(['veziyyet' => 'error', 'basliq' => $validateTitle, 'altyazi' => $validateText]);

                }





                try{
                    if($request->services_status=='0' ||$request->services_status=='1')
                    {
                        $check_in = $request->check_in;
                        $check_in = substr($check_in, 0, 19);
                        $check_in = Carbon::parse($check_in)->format('Y-m-d H:i:00');
                        $request->merge(['check_in' => $check_in]);


                        $check_out = $request->check_out;
                        $check_out = substr($check_out, 0, 19);
                        $check_out = Carbon::parse($check_out)->format('Y-m-d H:i:00');
                        $request->merge(['check_out' => $check_out]);
                    }
                    $request->merge(['user_id' => Auth::user()->id]);
                    Services_Log::create($request->all());
                    return response(['veziyyet' => 'success', 'basliq' => $SuccessTitle, 'altyazi' => $SuccessText]);
                }
                catch (Exception $e){
                    return response(['veziyyet' => 'error', 'basliq' => $ErrorTitle, 'altyazi' => $ErrorText]);
                }


            }
        }

    }
}
