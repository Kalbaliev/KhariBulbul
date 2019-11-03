<?php

namespace App\Http\Controllers;

use App\Card;
use App\Clients;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentPage extends Controller
{
 public function getClients(){

     if (!Auth::check() ) {
         return view('login');
     } else {
         if (Auth::user()->status!='0') {
             $clients = Clients::where('payment','<>',"---")->get();

             return view('bill')->with('clients', $clients);
         }
         else {


             return redirect('/');
         }
     }
 }



public  function post_billPayment(Request $request){
        $lang=\LaravelLocalization::setLocale();

        if($lang=='en'){
            $guestTitle='Attention!';
            $guestText='Guest user can not pay';


            $errorTitle='Oh pity!';
            $errorText='An error occurred';
            $successTitle='Congratulations!';
            $successText='Payment was completed successfully';

        }
        else if ($lang=='az'){
            $guestTitle='Diqqət!';
            $guestText='Qonaq istifadəçi ödəmə apara bilməz';
            $errorTitle='Təəssüf!';
            $errorText='Xəta baş verdi';
            $successTitle='Təbriklər!';
            $successText='Ödəmə uğurla həyata keçdi';


        }

        if (!Auth::check()) {
            return view('login');
        } else {


            $user_status=Auth::user()->status;
            if($user_status!='9')
            {
                try{

                    Clients::where('id',$request->id)->update(['status' => 1]);
                    return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);

                }
                catch (\Exception $e){


                    return response(['veziyyet' => 'error', 'basliq' => $errorTitle, 'altyazi' => $errorText]);
                }
            }
            else{
                return response(['veziyyet' => 'error', 'basliq' => $guestTitle, 'altyazi' => $guestText]);
            }

    }
 }

 public function postAddCard(Request $request)
 {
     $lang=\LaravelLocalization::setLocale();

     if($lang=='en'){


         $errorTitle='Oh pity!';
         $errorText='An error occurred';
         $successTitle='Congratulations!';
         $successText='Operation was completed successfully';

     }
     else if ($lang=='az'){

         $errorTitle='Təəssüf!';
         $errorText='Xəta baş verdi';
         $successTitle='Təbriklər!';
         $successText='Əməliyyat uğurla həyata keçdi';


     }

     if (!Auth::check()) {
         return view('login');
     } else {


         $user_status=Auth::user()->status;
         if($user_status=='9')

         {
             try{
                 $request->merge(['user_id' => Auth::user()->id]);
                 Card::create($request->all());

                 return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);

             }
             catch (\Exception $e){


//                 Bele edib sweeti silende erroru gormek olur lyuboy vaxt
//                 return $e->getMessage();


                 return response(['veziyyet' => 'error', 'basliq' => $errorTitle, 'altyazi' => $errorText]);
             }
         }

     }

 }

 public function postDeleteAndPay(Request $request){

     $lang=\LaravelLocalization::setLocale();

     if($lang=='en'){



         $errorTitle='Oh pity!';
         $errorText='An error occurred';
         $successTitle='Congratulations!';
         $successText='Operation was completed successfully';

     }
     else if ($lang=='az'){

         $errorTitle='Təəssüf!';
         $errorText='Xəta baş verdi';
         $successTitle='Təbriklər!';
         $successText='Əməliyyat uğurla həyata keçdi';


     }

     if (!Auth::check()) {
         return view('login');
     } else {



         try{

             if($request->operation=='pay'){


                 Clients::where('id',$request->id)->update(['status' =>'1']);
                 User::where('id',Auth::user()->id)->update(['status' =>'3']);
//                 Yeni uje bu profil silinmish hesab olunan kateqoriyaya aid edildi
                 return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);
             }
             elseif ($request->operation=='delete'){

                 Card::where('user_id',Auth::user()->id)->delete();
                 return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);
             }



         }
         catch (\Exception $e){


//             return $e->getMessage();
             return response(['veziyyet' => 'error', 'basliq' => $errorTitle, 'altyazi' => $errorText]);
         }



     }

 }
}
