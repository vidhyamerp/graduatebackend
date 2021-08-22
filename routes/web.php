<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GraduateController;
use App\Http\Controllers\CommonController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[GraduateController::class, 'index']);
Route::get('/', function () {
    return view('upload');
});
// Route::post('/api/store',[RegisterController::class, 'store']);

//authenicate
Route::post('/api/login', 'RegisterController@login');

Route::post('/api/store', 'RegisterController@store');
Route::post('/api/save', 'RegisterController@save');
Route::get('/api/edit/{id}', 'RegisterController@edit');
Route::get('/api/get/{id}', 'RegisterController@show');

Route::post('/api/storeuser', 'RegisterController@storeuser');

Route::get('/api/selected', 'RegisterController@selected');
Route::get('/api/rejected', 'RegisterController@rejected');
Route::get('/api/downloadPDF/{id}','CommonController@downloadPDF');
Route::get('/api/downloadrenewalPDF/{id}','CommonController@downloadrenewalPDF');
Route::get('/api/downloadIndividual/{id}','CommonController@downloadIndividual');
Route::post('/api/savefile',  'CommonController@store');

Route::get('/api/upload', 'CommonController@showUploadForm');
Route::post('/api/upload', 'CommonController@storeUploads');
Route::get('/api/fetch/{id}', 'CommonController@fetch');
Route::resource('contacts', 'ContactController');

Route::get('/api/piechart','CommonController@piechart');
Route::get('/api/piechart1','CommonController@piechart1');

Route::get('api/bulkdownload','CommonController@bulkdownload');

Route::get('api/select','RegisterController@selected');
Route::get('api/reject','RegisterController@rejected');
//aadhar verification 

Route::post('/api/aadharupload', 'RegisterController@aadharupload');
Route::get('/api/extract', 'RegisterController@extract');
Route::get('/api/index', 'RegisterController@index');

//password reset
Route::post('/api/resetpwd', 'RegisterController@reset');

//payment gateway
Route::get('/api/payment/registration', 'RegisterController@payment25')->name('payment25');
Route::post('/api/payments', 'RegisterController@payments')->name('payments');
Route::post('/api/renewalpayments', 'RegisterController@renewalpayments')->name('renewalpayments');
Route::get('api/payment/renewal', 'RegisterController@payment15')->name('payment15');
Route::get('/api/downloadreceipt/{id}','CommonController@downloadreceipt');
Route::get('/api/checkpaymentregister/{id}','CommonController@checkpaymentregister');
Route::get('/api/checkpaymentrenewal/{id}','CommonController@checkpaymentrenewal');
Route::get('/api/downloadrenewalreceipt/{id}','CommonController@downloadrenewalreceipt');
//Email OTP
Route::post('/api/verifiy',  'RegisterController@sendotp');

Route::post('/api/reg_otp',  'RegisterController@sendregotp');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

//Renewal

Route::post('/api/renewallogin', 'RegisterController@renewallogin');
Route::post('/api/storerenewaluser', 'RegisterController@storerenewaluser');
Route::post('/api/renew_reg_otp',  'RegisterController@renewregotp');
Route::get('/api/editrenew/{id}', 'RegisterController@editrenew');
Route::post('/api/renewalstore', 'RegisterController@renewalstore');
Route::post('/api/renewalsave', 'RegisterController@renewalsave');

Route::get('/api/renewpiechart','CommonController@renewpiechart');
Route::get('/api/renewpiechart1','CommonController@renewpiechart1');
Route::get('/api/renewselected', 'RegisterController@renewselected');
Route::get('/api/renewrejected', 'RegisterController@renewrejected');

Route::post('/api/remarks', 'RegisterController@remarks');
Route::post('/api/remarkrenewal', 'RegisterController@remarkrenewal');
Route::post('/api/accepted', 'RegisterController@accepted');
Route::post('/api/renewalaccepted', 'RegisterController@renewalaccepted');