<?php
use App\Mail\FriendsNotifyMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/inicio',function(){
    return view('prueba');
});
Route::resource('Client', ClientController::class);



Route::get('/send-mail', function () {
    Mail::to('newuser@example.com')->send(new FriendsNotifyMail());
    return 'A message has been sent to Mailtrap!';
});