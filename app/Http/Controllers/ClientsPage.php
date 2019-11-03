<?php

namespace App\Http\Controllers;

use App\Clients;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientsPage extends Controller
{
    public function getClients(){

        $user_status=Auth::user()->status;
        if (!Auth::check() ) {
            return view('login');
        } else {

            if(Auth::user()->status!='0' || Auth::user()->status!='9' || Auth::user()->status!='8' ) {
                $clients = Clients::all();

                foreach ($clients as $client) {
                    $client->check_in = Carbon::parse($client->check_in)->format('d/m/Y');
                    $client->check_out = Carbon::parse($client->check_out)->format('d/m/Y');

                }

                return view('clients')->with('clients', $clients);
            }
            else{

                return redirect('/');
            }
        }
    }
    public  function postClients(Request $request){
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


                Clients::where('id',$request->id)->delete();
                return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);

            }
            catch (\Exception $e){


                return response(['veziyyet' => 'error', 'basliq' => $errorTitle, 'altyazi' => $errorText]);
            }

        }
    }
}
