<?php

namespace App\Http\Controllers;

use App\Clients;
use App\Innovations;
use App\Rooms;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Exception;

class IndexPage extends Controller
{



    public function WheatherApp()
    {
        if (!Auth::check()) {
            return view('login');
        } else {




                if(Auth::user()->status!='0')
                {

                    if(Auth::user()->status=='8'){

                        return redirect('/Müştəri-Məlumatı');
                    }
                    function searchContent($basliq, $sonluq, $yazi)
                    {


                        @preg_match_all('/' . preg_quote($basliq, '/') .
                            '(.*?)' . preg_quote($sonluq, '/') . '/i', $yazi, $m);
                        return @$m[1];


                    }

                    $link_today = "https://weather.day.az/az/city/100587084/today.html";
                    $content_today = file_get_contents($link_today);
                    $derece_today = searchContent('<p class="degree">', '<span>', $content_today);
                    $title_today = searchContent('<strong>', '<', $content_today);
                    $comment_today = searchContent('img src="/assets/images/icons/states/d', '.', $content_today);


                    $feeling_today = searchContent('<p>Hiss edilir: ', '&deg;', $content_today);
                    $wind_today = searchContent('<p>Külək: ', '<', $content_today);
                    $humidity_today = searchContent('<p>Nisbi rütubət: ', '<', $content_today);
                    $pressure_today = searchContent('<p title="Atmosfer təzyiqi dəniz səviyyəsindən yuksəklik">Atmosfer təzyiqi: ', '<', $content_today);
                    $sunrise_today = searchContent('<p>Gün çıxır: ', '<', $content_today);
                    $sunset_today = searchContent('<p>Gün batır: ', '<', $content_today);


//        $link_tomorrow="https://weather.day.az/az/city/100587084/tomorrow.html";
//        $content_tomorrow=file_get_contents($link_tomorrow);
//        $derece_tomorrow=searchContent('<p class="degree">','..',$content_tomorrow);


                    $link_week = "https://weather.day.az/az/city/100587084/week.html";
                    $content_week = file_get_contents($link_week);
                    $derece_week = searchContent('<p class="degree">', '<span>', $content_week);
                    $comment_week = searchContent('<img src="/assets/images/icons/states/d', '.', $content_week);


//        Birder Bu gun

//$tomorrow= $derece_tomorrow[0];


                    for ($i = 0; $i < 6; $i++) {

                        $derece_week[$i] = str_replace("..", '-', $derece_week[$i]);
                        $derece_week[$i] = str_replace("+", '', $derece_week[$i]);
                    }

                    $gunes = "clear-day";
                    $ay = "clear-night";
                    $bulud_gunes = "partly-cloudy-day";
                    $bulud_ay = "partly-cloudy-night";
                    $bulud = "cloudy";
                    $yagis = "rain";
                    $guclu_yagis = "sleet";
                    $qar = "snow";
                    $kulek = "wind";
                    $duman = "fog";


                    for ($i = 0; $i < 6; $i++) {

                        if ($comment_week[$i] == 000 || $comment_week[$i] == 100) {

                            $comment_week[$i] = $gunes;

                        } elseif ($comment_week[$i] == 430) {

                            $comment_week[$i] = $guclu_yagis;

                        } elseif ($comment_week[$i] == 200) {

                            $comment_week[$i] = $bulud_gunes;
                        } elseif ($comment_week[$i] == 400 || $comment_week[$i] == 300) {

                            $comment_week[$i] = $bulud;
                        } elseif ($comment_week[$i] == 220 || $comment_week[$i] == 210 || $comment_week[$i] == 410 || $comment_week[$i] == 310 || $comment_week[$i] == 240 || $comment_week[$i] == 420 || $comment_week[$i] == 320) {

                            $comment_week[$i] = $yagis;
                        } elseif ($comment_week[$i] == 421 || $comment_week[$i] == 412 || $comment_week[$i] == 322 || $comment_week[$i] == 211 || $comment_week[$i] == 222 || $comment_week[$i] == 431 || $comment_week[$i] == 221 || $comment_week[$i] == 422 || $comment_week[$i] == 212 || $comment_week[$i] == 311 || $comment_week[$i] == 411 || $comment_week[$i] == 432) {

                            $comment_week[$i] = $qar;
                        }
                    }


                    if ($comment_today[0] == 000 || $comment_today[0] == 100) {

                        $comment_today[0] = $gunes;

                    } elseif ($comment_today[0] == 430) {

                        $comment_today[0] = $guclu_yagis;

                    } elseif ($comment_today[0] == 200) {

                        $comment_today[0] = $bulud_gunes;
                    } elseif ($comment_today[0] == 400 || $comment_today[0] == 300) {

                        $comment_today[0] = $bulud;
                    } elseif ($comment_today[0] == 220 || $comment_today[0] == 210 || $comment_today[0] == 410 || $comment_today[0] == 310 || $comment_today[0] == 240 || $comment_today[0] == 420 || $comment_today[0] == 320) {

                        $comment_today[0] = $yagis;
                    } elseif ($comment_today[0] == 421 || $comment_today[0] == 412 || $comment_today[0] == 322 || $comment_today[0] == 211 || $comment_today[0] == 222 || $comment_today[0] == 431 || $comment_today[0] == 221 || $comment_today[0] == 422 || $comment_today[0] == 212 || $comment_today[0] == 311 || $comment_today[0] == 411 || $comment_today[0] == 432) {

                        $comment_today[0] = $qar;
                    }


                    $logos = array($comment_week[0], $comment_week[1], $comment_week[2], $comment_week[3], $comment_week[4], $comment_week[5]);

//        Bosh olarsa her hansi biri


                    if (empty($derece_today[0])) {
                        $derece_today[0] = "Məlum deyil";
                    }
                    if (empty($feeling_today[0])) {
                        $feeling_today[0] = "Məlum deyil";
                    }
                    if (empty($wind_today[0])) {
                        $wind_today[0] = "Məlum deyil";
                    }
                    if (empty($humidity_today[0])) {
                        $humidity_today[0] = "Məlum deyil";
                    }
                    if (empty($pressure_today[0])) {
                        $pressure_today[0] = "Məlum deyil";
                    }
                    if (empty($sunrise_today[0])) {
                        $sunrise_today[0] = "Məlum deyil";
                    }
                    if (empty($sunset_today[0])) {
                        $sunset_today[0] = "Məlum deyil";
                    }
                    if (empty($title_today[0])) {
                        $title_today[0] = "Məlum deyil";
                    }
                    if (empty($comment_today[0])) {
                        $comment_today[0] = "Məlum deyil";
                    }
                    $today = array($derece_today[0], $feeling_today[0], $wind_today[0], $humidity_today[0], $pressure_today[0], $sunrise_today[0], $sunset_today[0], $title_today[0], $comment_today[0]);

                    date_default_timezone_set('Asia/Baku');







                    $client = Clients::where('status', 0)->count();
                    $room = Rooms::count();
                    $clients_forbithday=Clients::all();
                    $innovationsecond = Innovations::orderBy('created_at', 'desc')->skip(1)->take(1)->first();
                    $innovationthird = Innovations::orderBy('created_at', 'desc')->skip(2)->take(1)->first();
                    $innovationfirst=Innovations::orderBy('created_at', 'desc')->first();

           $today=Carbon::now('Asia/Baku');
           $today=Carbon::parse($today)->format('Y-m-d');
           for($i=6;0<=$i;$i--){

            $days[$i]=date('Y-m-d', strtotime('-'.$i.' days', strtotime($today)));

           }
           
           for($i=6;0<=$i;$i--){

            $countsClients[$i]=Clients::where('check_in','like','%'.$days[$i].'%')->count();
            $countsClients_out[$i]=Clients::where('check_out','like','%'.$days[$i].'%')->count();
           }


        
        $count1=$countsClients[6];
        $count2=$countsClients[5];
        $count3=$countsClients[4];
        $count4=$countsClients[3];
        $count5=$countsClients[2];
        $count6=$countsClients[1];
        $count7=$countsClients[0];
        
        $count1_out=$countsClients_out[6];
        $count2_out=$countsClients_out[5];
        $count3_out=$countsClients_out[4];
        $count4_out=$countsClients_out[3];
        $count5_out=$countsClients_out[2];
        $count6_out=$countsClients_out[1];
        $count7_out=$countsClients_out[0];
       
   

        
                  
            

        //    $chart_common_count=Clients::where('created_at','>',$first_day_chart)->where('created_at','<',$today_chart)->count('created_at');


            
                    return view('index')->with('derece_week', $derece_week)->with('today', $today)->with('logos', $logos)->with('client', $client)->with('room', $room)->with('innovationfirst',$innovationfirst)->with('innovationsecond',$innovationsecond)->with('innovationthird',$innovationthird)->with('clients_forbithday',$clients_forbithday)
                    ->with('count7',$count7)->with('count6',$count6)->with('count5',$count5)->with('count4',$count4)->with('count3',$count3)->with('count2',$count2)->with('count1',$count1)
                    ->with('count7_out',$count7_out)->with('count6_out',$count6_out)->with('count5_out',$count5_out)->with('count4_out',$count4_out)->with('count3_out',$count3_out)->with('count2_out',$count2_out)->with('count1_out',$count1_out);

                }

                else{

                    return redirect('/Qeydiyyat');
                }





        }
    }

//    GIRIS - CIXIS funksiyalari
    public function  getLogin (){
        if(!Auth::check()) {
            return view('login');
        }
        else{
            return redirect('/');
        }
    }
    public function  getRegister (){

        if(!Auth::check()) {
            return view('register');
        }
        else{
            return redirect('/');
        }
    }
    public function  getLogout (){

        Auth::logout();
        return redirect('/');
    }
    public function manualLogin(){

        $user = User::find(1);
        Auth::login($user);
        return redirect('/');
    }
}
