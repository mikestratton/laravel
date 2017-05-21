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

Route::get('/', function () {
    return view('welcome'); // points to resources/views/welcome.blade.php
});

Route::get('/post/{id}/{name}', function ($id, $name) { // id posts and catches variable
    return "This is post id number " . $id . " with the name " . $name;
});

// naming route
Route::get('admin/posts/recent/popular', array('as'=>'admin.home' ,function () {
    $url = route('admin.home');
    return "this url is " . $url;
}));

Route::get('/about', function () {
    return "about page goes here";
});

Route::get('/solutions', function () {
    return "solutions page goes here";
});

Route::get('/contact', function () {
    return "contact page goes here";
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