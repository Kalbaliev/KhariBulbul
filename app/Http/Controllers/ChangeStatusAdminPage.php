<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ChangeStatusAdminPage extends Controller
{
    function GetChangeStatus(){
        if (!Auth::check()) {
            return view('login');
        } else {

            if(Auth::user()->status=='1') {

                $users = User::all();

                return view('changeStatusAdmin')->with('users', $users);
            }
            else{

                return redirect('/');
            }
        }
    }
    public  function PostChangeStatus(Request $request){
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

                    if($request->operation=='change'){

                        User::where('id',$request->id)->update(['status' => $request->status]);
                    }
                    elseif ($request->operation=='delete'){

                        User::where('id',$request->id)->delete();
                    }

                    return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);

                }
                catch (\Exception $e){


                    return response(['veziyyet' => 'error', 'basliq' => $errorTitle, 'altyazi' => $errorText]);
                }



        }
    }
}
