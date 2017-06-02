<?php
use App\Post;
use App\User;

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

/*Route::get('/', function () {
    return view('index'); // points to resources/views/welcome.blade.php
});

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
Route::get('/user/{id}/pivot', function($id){

    $user = User::find($id);

    foreach($user->roles as $role) {

        echo $role->pivot->created_at;
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