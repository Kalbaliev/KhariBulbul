<?php

namespace App\Http\Controllers;

use App\Innovations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdvertiementPage extends Controller
{
    function GetAdvertisement(){
        if (!Auth::check()) {
            return view('login');
        } else {

            if(Auth::user()->status=='2' && Auth::user()->status=='1') {

                return view('advertisement');
            }
            else{

                return redirect('/');
            }
        }
    }
    function PostAdvertisement(Request $request){

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

                    $genre=$request->genre;

                    if($genre=='0'){

                        $photo_slug='0';
                        $ribbon_type_name='ribbon-danger';
                        $ribbon_icon_name='shopping-bag';
                    }

                    elseif($genre=='1'){

                        $photo_slug='1';
                        $ribbon_type_name='ribbon-warning';
                        $ribbon_icon_name='cutlery';
                    }
                    elseif($genre=='2'){

                        $photo_slug='2';
                        $ribbon_type_name='ribbon-dark';
                        $ribbon_icon_name='glass';
                    }
                    elseif($genre=='3'){

                        $photo_slug='3';
                        $ribbon_type_name='ribbon-success';
                        $ribbon_icon_name='heartbeat';
                    }
                    elseif($genre=='4'){

                        $photo_slug='4';
                        $ribbon_type_name='ribbon-info';
                        $ribbon_icon_name='handsshae-o';
                    }

                    $request->merge(['photo_slug' => $photo_slug]);
                    $request->merge(['ribbon_type_name' => $ribbon_type_name]);
                    $request->merge(['ribbon_icon_name' => $ribbon_icon_name]);
                    unset($request['genre']);

                    Innovations::create($request->all());
                    return response(['veziyyet' => 'success', 'basliq' => $successTitle, 'altyazi' => $successText]);

                }
                catch (\Exception $e){


                    return response(['veziyyet' => 'error', 'basliq' => $errorTitle, 'altyazi' => $errorText]);
                }



            }
        }

}
