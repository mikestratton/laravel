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

use App\Post;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create/{id}', function($id) {

    $user = User::findOrFail($id);

//    $post = new Post(['title'=>'New Laravel Post 2', 'body'=>'Laravel is awesome!']);

    $user->posts()->save(new Post(['title'=>'EasyEdit CMS', 'body'=>'MVC Horse presents: EasyEdit CMS!']));
});

Route::get('/read/{id}/user', function($id){

    $user = User::findOrFail($id);

    foreach($user->posts as $post){
        echo $post->title . '<br>' . $post->body . '<br><br>';
    }
});

Route::get('/divedump/{id}/user', function($id){

    $user = User::findOrFail($id);
//    dd($user->posts);
    dd($user); // returns user object
});

Route::get('/update/user{id}/post{post_id}', function($id,$post_id){

    $user = User::find($id);

//    $user->posts()->whereId($post_id)->update(['title'=>'Laravel Rocks','body'=>'I believe my career is set as a result of learning laravel']);

    $user->posts()->where('id', '=', $post_id)->update(['title'=>'MVC Horse','body'=>'I believe my career is set as a result of learning MVC Horse']);

});

Route::get('/delete/user{id}/post{post_id}', function($id, $post_id) {

    $user = User::find($id);
    $user_name = $user->name;
    $user->posts()->whereId($post_id)->delete();

    return 'Post ID: ' . $post_id . 'by User: ' . $user_name . ' has been deleted.';

    // WARNING! deletes all posts
//    $user->posts()->delete();
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