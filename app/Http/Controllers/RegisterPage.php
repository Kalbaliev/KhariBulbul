<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Rooms;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class RegisterPage extends Controller
{





//    Registrasiya etmek ucun
    public function PostRegister(Request $request)
    {
        $lang=\LaravelLocalization::setLocale();

        if($lang=='en'){
            $guestTitle='Attention!';
            $guestText='Guest user can not register';


            $validateTitle="Oh Pity!";
            $validateText="Fill each cells, do not empty !";
            $clientRegisterTitle="Congratulations!";
            $clientRegisterText="Registration was completed successfully";
            $clientRegisterErrorTitle="Oh Pity!";
            $clientRegisterErrorText="An error occurred while registering";
            $clientRegisterErrorTitleHumanNumb="Oh Pity!";
            $clientRegisterErrorTextHumanNumb="You cannot select a client more than the given  client number of room's total ";
            $dontClientRegisterTitle="Oh Pity!";
            $dontClientRegisterText="Registration can not be done on the specified date";
            $dontClientRegisterBetweenTitle="Oh Pity!";
            $dontClientRegisterBetweenText="On the specified registration date is overlaping another  registration date";
            $registrationTimeText="Registration date";
            $youHaveRegisterDateTitle='Oh Pity!';
            $youHaveRegisterDateText='On the specified date have another client\'s registration date';
            $fromThisDate='from this date';
            $great='GREAT';
            $little='LITTLE';
            $select_date='select date !';
            $haveDifferentDateCheckTitle='Oh Pity!';
            $haveDifferentDateCheckTextEntry='Have CHECK IN DATE between the selected date';
            $haveDifferentDateCheckTextExit='Have CHECK OUT DATE between the selected date';

        }
       else if ($lang=='az'){
           $guestTitle='Diqqət!';
           $guestText='Qonaq istifadəçi qeydiyyat apara bilməz';


           $validateTitle="Təəssüf!";
           $validateText="Xanaların hər birini doldurun, boş saxlamayın !";
           $clientRegisterTitle="Təbriklər!";
           $clientRegisterText="Müştəri qeydiyyatı uğurla başa çatdı";
           $clientRegisterErrorTitle="Təəssüf!";
           $clientRegisterErrorText="Qeydiyyat aparılarkən xəta baş verdi";
           $clientRegisterErrorTitleHumanNumb="Təəssüf!";
           $clientRegisterErrorTextHumanNumb="Otağın ümumi verilmiş müştəri sayından artıq müştəri seçə bilməzsiniz!";
           $dontClientRegisterTitle="Təəssüf!";
           $dontClientRegisterText="Göstərilən tarixə qeydiyyatınız aparıla bilməz";
           $dontClientRegisterBetweenTitle="Təəssüf!";
           $dontClientRegisterBetweenText="Göstərdiyiniz tarix aralıqı başqa müştərinin qeydiyatı ilə üst-üstə düşür";
           $registrationTimeText="Qeydiyyat Tarixi";
           $youHaveRegisterDateTitle='Təəssüf!';
           $youHaveRegisterDateText='Sizin seçdiyiniz tarixdə müştəri qeydiyyatı var';
           $fromThisDate='bu tarixdən';
           $great='BÖYÜK';
           $little='KİÇİK';
           $select_date='tarix seçin !';
           $haveDifferentDateCheckTitle='Təəsüüf!';
           $haveDifferentDateCheckTextEntry='Seçilmiş tarix arasında başqa qeydiyyatın QƏBUL günü var';
           $haveDifferentDateCheckTextExit='Seçilmiş tarix arasında başqa qeydiyyatın ÇIXIŞ günü var';

       }



        if (!Auth::check()) {
            return view('login');
        }
        else {

           if(Auth::user()->status!='9' || Auth::user()->status!='8') {

               $validator = Validator::make($request->all(), [

                   'first_name' => 'required|max:25',
                   'last_name' => 'required|max:30',
                   'father_name' => 'required|max:25',
                   'FIN' => 'required',
                   'birth_place' => 'required|max:200',
                   'birthday' => 'required',

                   'phone' => 'required',
                   'check_in' => 'required',
                   'check_out' => 'required',
                   'peoples' => 'required',
                   'room_no' => 'required',
                   'people_number_human' => 'required',


               ]);

               if ($validator->fails()) {

                   return response(['veziyyet' => 'error', 'basliq' => $validateTitle, 'altyazi' => $validateText]);

               }


               $birthday = $request->birthday;

               $birthday = Carbon::parse($birthday)->format('Y-m-d');
               $request->merge(['birthday' => $birthday]);


               $check_in = $request->check_in;
               $check_in = substr($check_in, 0, 19);
               $check_in = Carbon::parse($check_in)->format('Y-m-d H:i:00');
               $request->merge(['check_in' => $check_in]);


               $check_out = $request->check_out;
               $check_out = substr($check_out, 0, 19);
               $check_out = Carbon::parse($check_out)->format('Y-m-d H:i:00');
               $request->merge(['check_out' => $check_out]);


//        SECILEN OTAQ
               $room_no = $request->room_no;


//        Bu eger hansisa qeydiyat tarixin arasina dusse ona gore
               $same_check_out = Clients::where('check_out', '>', $check_out)->where('room_no', $room_no)->where('status', 0)->min('check_out');
               $same_check_in = Clients::where('check_in', '<', $check_in)->where('room_no', $room_no)->where('status', 0)->max('check_in');

//        Bu diger qeydiyatlar arasi bowluq yeri tapmaga goredi
               $clients_check_in = Clients::where('check_in', '>', $check_out)->where('room_no', $room_no)->where('status', 0)->min('check_in');
               $clients_check_out = Clients::where('check_out', '<', $check_in)->where('room_no', $room_no)->where('status', 0)->max('check_out');

//       Buda qeyd edilen tarixin arasinda her hansi qeydiyatin bawi ve ya sonu dusmesi ile elaqelidi
               $between_check_in = Clients::whereBetween('check_in', [$check_in, $check_out])->where('room_no', $room_no)->where('status', 0)->min('check_in');
               $between_check_out = Clients::whereBetween('check_out', [$check_in, $check_out])->where('room_no', $room_no)->where('status', 0)->max('check_out');


               if (empty($between_check_in) && empty($between_check_out)) {

                   if (!($same_check_in > $clients_check_out || $same_check_out < $clients_check_in)) {
                       if (empty($clients_check_in)) {
                           $clients_check_in = date("2050-01-01 00:00:00");
                       }
                       if (empty($clients_check_out)) {
                           $clients_check_out = Carbon::now();
                       }

                       if ($clients_check_in > $check_out && $clients_check_out < $check_in) {


                           $user_status = Auth::user()->status;
                           if ($user_status != '9' || $user_status != '8') {
                               try {
                                   $time1 = strtotime($check_in);
                                   $time2 = strtotime($check_out);
                                   $onedaypayment = $request->payment;
                                   $daycount = floor(($time2 - $time1) / 86400);
                                   $daycount = $daycount * intval($request->payment);
                                   $daycount = strval($daycount) . " AZN";
                                   $request->merge(['payment' => $daycount]);
                                   $request->merge(['worker_id' => Auth::user()->id]);

                                   if(Auth::user()->status=='1' || Auth::user()->status=='2') {
                                       $request2['first_name'] = $request->first_name;
                                       $request2['last_name'] = $request->last_name;

                                       if($request->people_number_human=='1'){
                                           $request2['status'] = '9';
                                       }
                                       elseif($request->people_number_human>1){
                                           $request2['status'] = '8';
                                       }

                                       $last = User::orderBy('id', 'desc')->get()->first();
                                       $id = $last->id;
                                       $request2['name'] = str_slug($request->first_name . $id);
                                       $request2['email'] = "hiiop@gmail.com";

                                       $yeniReqem=($id*25)+22;
                                       $yeniSlug=str_slug($request->last_name);

                                       $request2['password'] = $yeniSlug.$yeniReqem;

                                       User::create([
                                           'name' => $request2['name'],
                                           'first_name' => $request2['first_name'],
                                           'last_name' => $request2['last_name'],
                                           'email' => $request2['email'],
                                           'status' => $request2['status'],
                                           'password' => bcrypt($request2['password']),

                                       ]);

//
                                   }


                                   $last = User::orderBy('id', 'desc')->get()->first();
                                   $user_id = $last->id;
                                   $request->merge(['user_id' => $user_id]);

                                   if($request->people_number_human <=$request->peoplenumb)
                                   {

                                           Clients::create($request->all());


                                           if(Auth::user()->status=='0' && $request->people_number_human>'1')
                                           {
                                               User::where('id',Auth::user()->id)->update(['status' => 8]);
                                               return response(['veziyyet' => 'success', 'basliq' => $clientRegisterTitle, 'altyazi' => $clientRegisterText.'</br>'.'<p>Lütfən qeydiyyatı başa çatdırın!</p>']);
                                           }
                                           elseif (Auth::user()->status=='0' && $request->people_number_human=='1'){

                                               User::where('id',Auth::user()->id)->update(['status' => 9]);
                                               return response(['veziyyet' => 'success', 'basliq' => $clientRegisterTitle, 'altyazi' => $clientRegisterText]);
                                           }


                                           return response(['veziyyet' => 'success', 'basliq' => $clientRegisterTitle, 'altyazi' =>'Sizin logininiz:'.'<b>'.$request2['name'].'</b><br>'.'Sizin parolunuz : '.'<b>'.$request2['password'].'</b>' ]);
                                   }
                                   else{

                                       return response(['veziyyet' => 'error', 'basliq' => $clientRegisterErrorTitleHumanNumb, 'altyazi' => $clientRegisterErrorTextHumanNumb]);
                                   }
                               }
                               catch (\Exception $e) {


                                   return response(['veziyyet' => 'error', 'basliq' => $clientRegisterErrorTitle, 'altyazi' => $clientRegisterErrorText]);
                               }
                           } else {
                               return response(['veziyyet' => 'error', 'basliq' => $guestTitle, 'altyazi' => $guestText]);
                           }

                       } else {


                           return response(['veziyyet' => 'error', 'basliq' => $dontClientRegisterTitle, 'altyazi' => $dontClientRegisterText]);
                       }


                   } else {

                       return response(['veziyyet' => 'error', 'basliq' => $dontClientRegisterBetweenTitle, 'altyazi' => $dontClientRegisterBetweenText . '<br/><h3>' . $registrationTimeText . '</h3>' . '<h4 style="color: red;font-weight: 400">' . $same_check_in . '&nbsp - &nbsp' . $same_check_out . '</h4>']);
                   }


               } else {
                   if (!empty($between_check_in) && !empty($between_check_out)) {


                       if ($between_check_in < $between_check_out) {

                           return response(['veziyyet' => 'error', 'basliq' => $youHaveRegisterDateTitle, 'altyazi' => $youHaveRegisterDateText . ' <br/>' . '<h4 style="color: red">' . $between_check_in . '&nbsp - &nbsp' . $between_check_out . '</h4>']);
                       } else {

                           return response(['veziyyet' => 'error', 'basliq' => $youHaveRegisterDateTitle, 'altyazi' => $youHaveRegisterDateText . '<br/>' . '<h4 style="color: red">' . $between_check_out . '&nbsp <b style="color: black">' . $fromThisDate . '<b >' . $great . '</b></b></br>' . $between_check_in . '&nbsp <b style="color: black">' . $fromThisDate . '<b>' . $little . '</b>' . $select_date . '</b></h4>']);
                       }

                   } else {

                       if (!empty($between_check_in)) {

                           return response(['veziyyet' => 'error', 'basliq' => $haveDifferentDateCheckTitle, 'altyazi' => $haveDifferentDateCheckTextEntry . '<h1 style="color:red">' . $between_check_in . '</h1>']);
                       }
                       if (!empty($between_check_out)) {

                           return response(['veziyyet' => 'error', 'basliq' => $haveDifferentDateCheckTitle, 'altyazi' => $haveDifferentDateCheckTextExit . '<h1 style="color:red">' . $between_check_out . '</h1>']);
                       }
                   }


               }


           }
           else{

               return redirect ('/');
           }
    }

    }



//    Otaqlari duzmek ucun
    public function GetRegister()
    {

        if (!Auth::check()) {
            return view('login');
        } else {
            if(Auth::user()->status!='9' && Auth::user()->status!='8' ) {

                $floors = Rooms::distinct()->orderBy('floor')->get(['floor']);
                $first_rooms = Rooms::where('people_number', 1)->where('room_status', 0)->get();

                return view('registration')->with('first_rooms', $first_rooms)->with('floors', $floors);
            }
            else{

                return redirect('/');
            }
        }
    }




//    BOS otaqlari selecte doldurmaq ucun
   public function PostFreeRooms(Request $request){
       if (!Auth::check()) {
           return view('login');
       } else {
           $people_number = $request->people_number;
           $room_status = $request->room_status;
           $free_rooms = Rooms::where('people_number', $people_number)->where('room_status', $room_status)->get();
           $floors = Rooms::distinct()->orderBy('floor')->get(['floor']);
           return view('Rooms')->with('free_rooms', $free_rooms)->with('floors', $floors);
       }
}}