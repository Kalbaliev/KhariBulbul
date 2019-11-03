<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Clients;
use App\User;
use Validator;

class RegisterForClientsPage extends Controller
{
    function GetRegisterForClients()
    {
        if (!Auth::check()) {
            return view('login');
        } else {

            if (Auth::user()->status == '8') {

                return view('registerForClients');
            }
            else{
                return redirect('/');
            }
        }
    }

    //    Registrasiya etmek ucun
    public function PostRegisterForClients(Request $request)
    {
        $lang = \LaravelLocalization::setLocale();

        if ($lang == 'en') {


            $validateTitle = "Oh Pity!";
            $validateText = "Fill each cells, do not empty !";
            $clientRegisterTitle = "Congratulations!";
            $clientRegisterText = "Registration was completed successfully";
            $clientRegisterErrorTitle = "Oh Pity!";
            $clientRegisterErrorText = "An error occurred while registering";


        } else if ($lang == 'az') {


            $validateTitle = "Təəssüf!";
            $validateText = "Xanaların hər birini doldurun, boş saxlamayın !";
            $clientRegisterTitle = "Təbriklər!";
            $clientRegisterText = "Müştəri qeydiyyatı uğurla başa çatdı";
            $clientRegisterErrorTitle = "Təəssüf!";
            $clientRegisterErrorText = "Qeydiyyat aparılarkən xəta baş verdi";


        }


        if (!Auth::check()) {
            return view('login');
        } else {

            if (Auth::user()->status == '8') {

                $clients = Clients::where('user_id', Auth::user()->id)->get();
                $client=$clients->first();


                $validator = Validator::make($request->all(), [

                    'first_name' => 'required|max:25',
                    'last_name' => 'required|max:30',
                    'father_name' => 'required|max:25',
                    'FIN' => 'required|max:20',
                    'birthplace' => 'required|max:200',
                    'birthday' => 'required',


                ]);

                if ($validator->fails()) {

                    return response(['veziyyet' => 'error', 'basliq' => $validateTitle, 'altyazi' => $validateText]);

                }


                $birthday = $request->birthday;
                $birthday = Carbon::parse($birthday)->format('Y-m-d');




                $check_in = $client->check_in;
                $check_out = $client->check_out;
                $room_no = $client->room_no;
                $peoples = $client->peoples;
                $people_number_human = $client->people_number_human;
                $services = $client->services;
                $status = $client->status;
                $user_id=$client->user_id;
                $worker_id=$client->worker_id;
                $payment="---";
                $phone="---";



                $indiki_say=$clients->count();
                $elaveSay=$indiki_say+1;

                $max_say=$people_number_human;

                $request->merge(['birthday' => $birthday,'phone'=>$phone,'room_no' => $room_no,'peoples'=>$peoples,'people_number_human'=>$people_number_human,'services'=>$services,
                    'check_in'=>$check_in,'check_out'=>$check_out,'payment'=>$payment,'status'=>$status,'user_id'=>$user_id,'worker_id'=>$worker_id]);

                try {
                    Clients::create($request->all());
                    if(Auth::user()->status=='8' && $elaveSay==$max_say)
                    {
                        User::where('id',Auth::user()->id)->update(['status' => 9]);
                    }
                    return response(['veziyyet' => 'success', 'basliq' => $clientRegisterTitle, 'altyazi' => $clientRegisterText]);

                   }
                   catch (\Exception $e)
                   {

                      return response(['veziyyet' => 'error', 'basliq' => $clientRegisterErrorTitle, 'altyazi' => $clientRegisterErrorText]);
                    }

            }
        }
    }
}