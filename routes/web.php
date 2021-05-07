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
Route::get('/api/downloadIndividual/{id}','CommonController@downloadIndividual');
Route::post('/api/savefile',  'CommonController@store');

Route::get('/api/upload', 'CommonController@showUploadForm');
Route::post('/api/upload', 'CommonController@storeUploads');
Route::get('/api/fetch/{id}', 'CommonController@fetch');
Route::resource('contacts', 'ContactController');

Route::get('/api/piechart','CommonController@piechart');
Route::get('/api/piechart1','CommonController@piechart1');

Route::get('api/bulkdownload','CommonController@bulkdownload');

Route::get('api/select','CommonController@select');
Route::get('api/reject','CommonController@reject');
//aadhar verification 

Route::post('/api/aadharupload', 'RegisterController@aadharupload');
Route::get('/api/extract', 'RegisterController@extract');
Route::get('/api/index', 'RegisterController@index');

//password reset
Route::post('/api/resetpwd', 'RegisterController@reset');

//payment gateway
Route::get('/api/payment', 'RegisterController@payment')->name('payment');

//Email OTP
Route::post('/api/verifiy',  'RegisterController@sendotp');