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
Route::post('/api/store', 'RegisterController@store');
Route::get('/api/selected', 'RegisterController@selected');
Route::get('/api/rejected', 'RegisterController@rejected');
Route::get('/api/downloadPDF/{id}','CommonController@downloadPDF');

Route::post('/api/savefile',  'CommonController@store');

Route::get('/api/upload', 'CommonController@showUploadForm');
Route::post('/api/upload', 'CommonController@storeUploads');

Route::resource('contacts', 'ContactController');

Route::get('/api/piechart','CommonController@piechart');
Route::get('/api/piechart1','CommonController@piechart1');

Route::get('api/bulkdownload','CommonController@bulkdownload');