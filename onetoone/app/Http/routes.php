<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function(){

    $user = User::findOrFail(1);

    $address = new Address(['name'=>'1535 Russell Ave, New York, New York, 12345']);

    $user->address()->save($address);
});

Route::get('/update', function(){

    $address = Address::whereUserId(1)->first();

    $address->name = "123 Updated Avenue, Small Town, Ohio";

    $address->save();

});


Route::get('/read', function(){

    $user = User::findOrFail(1);

    echo $user->address->name;

});


Route::get('/delete', function(){

    $user = User::findOrFail(1);

    $user->address()->delete();

    return "deleted";
});




/*
|------------------------------------
| Application Routes
|------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
 */
// security feature for laravel
Route::group(['middleware' => ['web']], function () {


});
