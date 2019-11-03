<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::group(['prefix' => \LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function() {



    //Login REGISTER Logout
    Route::get('/Giriş',"IndexPage@getLogin");//Giris
    Route::get('/Qeyd',"IndexPage@getRegister");//Qeydiyyat
    Route::get('/Çıxış',"IndexPage@getLogout");//CIXIS
    Route::get('/ManualLogin',"IndexPage@manualLogin");//Manual Login





    Route::get('/', "IndexPage@WheatherApp");
    Route::get('/Qeydiyyat',"RegisterPage@GetRegister");
    Route::post('/Qeydiyyat',"RegisterPage@PostRegister");
    Route::get('/Ödəniş',"PaymentPage@getClients");
    Route::post('/Ödəniş',"PaymentPage@post_billPayment");//Kategriya silmek
    Route::post('/Ödəniş',"PaymentPage@postAddCard");//Kredit karti elave etmek
    Route::post('/Deletecard-Paycard',"PaymentPage@postDeleteAndPay");//Kredit kartla odenish ve ya karti silmek

    Route::get('/Müştərilər', "ClientsPage@getClients");
    Route::post('/Müştərilər', "ClientsPage@postClients");
    Route::get('/Yeniliklər', "InnovationsPage@getInnovations");
    Route::get('/Personallar',"PersonalPage@getPersonals");
    Route::get('/Vəzifəli-şəxslər',"PersonalPage@getEmployees" );

    Route::get('/Xidmətlər',"ServicesPage@GetServices");
    Route::post('/Xidmətlər',"ServicesPage@PostServices");

    Route::get('/Müştəri-Məlumatı',"RegisterForClientsPage@GetRegisterForClients");
    Route::post('/Müştəri-Məlumatı',"RegisterForClientsPage@PostRegisterForClients");

    Route::get('/İstifadəçilər',"ChangeStatusAdminPage@GetChangeStatus");
    Route::post('/İstifadəçilər',"ChangeStatusAdminPage@PostChangeStatus");

    Route::get('/Elan-Yarat',"AdvertiementPage@GetAdvertisement");
    Route::post('/Elan-Yarat',"AdvertiementPage@PostAdvertisement");

    Route::get('/Çek',"CheckPage@GetCheck");

});


//AJAXLAR ucun
Route::post('/hotel/rooms',"RegisterPage@PostFreeRooms");
Route::post('/hotel/employees',"PersonalPage@PostSortEmployee");
Route::post('/hotel/personals',"PersonalPage@PostSortPersonal");

Route::post('/Deletecard-Paycard',"PaymentPage@postDeleteAndPay");//Kredit kartla odenish ve ya karti silmek





Auth::routes();
