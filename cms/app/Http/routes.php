<?php
use App\Country;
use App\Post;
use App\Tag;
use App\User;
use App\Photo;
use App\Video;
use Carbon\Carbon;

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

/*
Route::get('/', 'PostsController@home');

Route::get('/about', 'PostsController@about');

Route::get('/solutions', 'PostsController@solutions');

Route::get('/contact', 'PostsController@contact');

Route::get('/welcome', 'PostsController@welcome'); //default laravel

Route::get('/{id}/{name}/{password}', 'PostsController@show_post');

Route::get('/sample', 'PostsController@sample');




/*
Route::get('/post/{id}/{name}', function ($id, $name) { // id posts and catches variable
    return "This is post id number " . $id . " with the name " . $name;
});

// naming route
Route::get('admin/posts/recent/popular', array('as'=>'admin.home' ,function () {
    $url = route('admin.home');
    return "this url is " . $url;
}));

Route::resource('posts', 'PostsController');*/


/*
|------------------------------------
| DATABASE Raw SQL Queries
| Create, Read, Update, Delete
|------------------------------------
*/

// create example
/*Route::get('/insert', function(){
   DB::insert('insert into posts(title, content) values(?, ?)', ['Eloquent', 'Eloquent uses the Object Relational Model quite eloquently.']);

});*/

// read example
/*Route::get('/read', function(){
    $results = DB::select('select * from posts where id=?', [1]);

    foreach($results as $post){
        return $post->title;
    }
});*/

// update example
/*Route::get('/update', function(){

    $updated = DB::update('update posts set title="Updated Title" where id=?', [1]);
    return $updated;
});*/

// delete example
/*Route::get('/delete', function(){
   $deleted = DB::delete('delete from posts where id=?', [1]);
   return $deleted;
});*/


/*
|------------------------------------
| Eloquent
| ORM (Object Relational Model)
|------------------------------------
*/

/*Route::get('/read2', function(){
   $posts = Post::all();

   foreach($posts as $post){
       return $post->title;
   }
});*/

/*Route::get('/find', function(){
   $post = Post::find(6);

   return $post->title . '<br>' . $post->content;
});*/


/*Route::get('/findwhere', function(){
    $posts = Post::where('id', 6)->orderBy('title', 'desc')->take(1)->get();

    return $posts;
});*/

/*Route::get('/findmore', function(){

//    $posts = Post::findOrFail(23);
//    return $posts;

//    $posts = Post::where('users_count', '<', 50)->firstOrFail;

});*/


//create new record
/*Route::get('/basicinsert', function(){

    $post = new Post;

    $post->title = 'Mike Stratton Merger';
    $post->content = 'MikeStratton.net is now MVC Horse';

    $post->save();

});*/

// update post with find
/*Route::get('/basicinsertupdate', function(){

    $post = Post::find(8);

    $post->title = 'New Eloquent 2';
    $post->content = 'Added some content with eloquent 2';

    $post->save();

});*/

//creating data and configuring mass assignment
/*Route::get('/create', function(){

    Post::create(['title'=>'the create method', 'content'=>'Learning alot with Laravel']);

});*/


// update data with eloquent
/*Route::get('/update', function(){

    Post::where('id', 6)->where('is_admin', 0)->update(['title'=>'New PHP Title', 'content'=>'Laravel is great']);

});*/

// delete data with eloquent
/*Route::get('/delete', function(){

    $post = Post::find(6);
    $post->delete();
});*/

/*Route::get('/delete2', function(){

    Post::destroy([9,10]);

//     Post::where('is_admin', 0)->delete();

});*/

// Soft Delete/Trashing
/*Route::get('/softdelete', function(){

    Post::find(21)->delete();

});*/

// send posts to trash
/*Route::get('/readsoftdelete', function(){

//    $post = Post::find(11);
//    return $post;

    // all items including trash
//    $post= Post::withTrashed()->where('is_admin', 0)->get();
//    return $post;//

    // just items in trash
//    $post= Post::onlyTrashed()->where('is_admin', 0)->get();
//    return $post;
});*/


/*Route::get('/restore', function(){

    Post::withTrashed()->where('is_admin', 0)->restore();

});

Route::get('/forcedelete', function(){
    Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});*/

/*
|------------------------------------
| Eloquent Relationships
|------------------------------------
*/

// One to One Relationship
/*Route::get('/user/{id}/post', function($id){

    return User::find($id)->post->content;

});*/

// One to One Relationship (Inverse)
/*Route::get('/post/{id}/user', function($id){

    return Post::find($id)->user->name;

});*/

// One to Many Relationship
/*Route::get('/posts', function($id){

    $user = User::find($id);

    foreach($user->posts as $post){
        echo $post->title . '<br>';
    }
});*/

// Many to Many Relationship
/*Route::get('/user/{id}/role', function($id){

    $user = User::find($id)->roles()->orderBy('id', 'desc')->get();
    return $user;

//    foreach($user->roles as $role){
//    return $role->name;
    }
});*/

// Accessing the intermediate table (aka pivot table)
/*Route::get('/user/{id}/pivot', function($id){

    $user = User::find($id);

    foreach($user->roles as $role) {

        echo $role->pivot->created_at;
    }

});*/


// Has many through Reference: https://laravel.com/docs/5.2/eloquent-relationships#has-many-through
/*Route::get('/user/{id}/country', function($id){

    $country = Country::find($id);

    foreach($country->posts as $post) {
        echo '<h2>' . $post->title . '</h2>' . '<p>' . $post->content . '</p><br><hr><br>';
    }

});*/


// Polymorphic Relations Reference: https://laravel.com/docs/5.2/eloquent-relationships#polymorphic-relations
/*Route::get('user/{id}/photos', function($id){

    $user = User::find($id);

    foreach($user->photos as $photo) {
        echo "<p><img style=\"max-height:200px;max-width:250px;width:auto;\" src=\"http://localhost/laravel/cms/public/mvchorse/images/" . $photo->path . "\"></p>";
    }

});*/

/*Route::get('post/{id}/photos', function($id){

    $post = Post::find($id);

    foreach($post->photos as $photo) {
        echo "<p><img style=\"max-height:200px;max-width:250px;width:auto;\" src=\"http://localhost/laravel/cms/public/images/" . $photo->path . "\"></p>";
    }

});*/

// Polymorphic Relations : Inverse
/*Route::get('/photo/{id}/post', function($id){

    $photo = Photo::findOrFail($id);

    return $photo->imagetable;

});*/


// Many to Many Polymorphic Relations
/*Route::get('/post/{id}/tag', function($id){

    $post = Post::find($id);

    foreach($post->tags as $tag) {
        echo $tag->name;
    }
});*/

/*Route::get('/tag/{id}/post', function($id){

    $tag = Tag::find($id);

    foreach($tag->posts as $post) {
        echo $post->title;
    }
});*/

/*
|------------------------------------
| CRUD Application
|------------------------------------
 */

    Route::resource('/posts', 'PostsController');

    Route::get('/dates', function(){

        echo 'PHP DateTime +10 days:<br>';
        $date = new DateTime('+10 days');
        echo $date->format('m-d-Y');

        echo '<br><br>Carbon +10 days diffForHumans:<br>';
        echo Carbon::now()->addDays(10)->diffForHumans();
        echo '<br><br>A few more Carbon using diffForHumans:</br>';
        echo Carbon::now()->subMonths(5)->diffForHumans();
        echo '<br>';
        echo Carbon::now()->yesterday()->diffForHumans();
    });

    Route::get('/getname', function(){
        $user = User::find(1);
        echo $user->name;
    });

    Route::get('/setname', function(){
        $user = User::find(1);
        $user->name = "buster";
        $user->save();
    });



/*
|------------------------------------
| Authorization for logged users
|------------------------------------
Route::group(['middleware' => ['auth']], function () {

});
 */

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