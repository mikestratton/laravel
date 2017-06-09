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
Use App\tag;
use App\Video;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {

    $post = Post::create(['name'=>'My 3rd Post']);
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'video3.mov']);
    $tag2 = Tag::find(2);
    $video->tags()->save($tag2);
});

Route::get('/read', function() {

    $post = Post::findOrFail(6);

    foreach($post->tags as $tag){
        echo $tag;
    }
});
Route::get('/update', function() {

//    $post = Post::findOrFail(7);
//
//    foreach($post->tags as $tag){
//
//       return $tag->whereId(1)->update(['name'=>'Updated PHP']);
//    }

    $post = Post::findOrFail(1);
    $tag = Tag::find(3);

    $post->tags()->save($tag);
//    $post->tags()->attach($tag);
//    $post->tags()->sync([1]);


});

Route::get('/delete', function() {

    $post = Post::findOrFail(8);

    foreach($post->tags as $tag){

        $tag->whereId(3)->delete();

    }

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