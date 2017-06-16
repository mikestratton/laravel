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

use Illuminate\Support\Facades\Mail;

Route::get('/', function(){
    return view('welcome');
});

Route::get('/email', function () {

    $data = [
        'title'   => 'Shut up and buy me something!',
        'content' => 'Mike your a bum if you don\'t do something for my birthday.'
    ];

    Mail::send('emails.test', $data, function($message){

        $message->to('mike@mikestratton.net', 'Mike Stratton')->subject('Official mvc horse collaboration');
    });
});
