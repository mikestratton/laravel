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

use App\Role;
use App\User;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function() {

    $user = User::find(1);

    $user->roles()->save(new Role(['name'=>'Auditor']));

    return $user->roles;
});

// create role by url
Route::get('/url-create/{role_name}', function($role_name) {

    $user = User::find(1);

    $user->roles()->save(new Role(['name'=>$role_name]));

    return $user->roles;
});

Route::get('/read/user{id}/roles', function($id){

   $user = User::findOrFail($id);

//   dd($user->roles);

   foreach($user->roles as $role){
       echo 'Role Name: ' . $role->name . '<br>';
   }
});

Route::get('/update{id}', function($id){

   $user = User::findOrFail($id);

   if($user->has('roles')){ // https://laravel.com/docs/5.4/collections#method-has

       echo 'User has roles<br>';

        foreach($user->roles as $role){

            echo '<strong>' . $role->name . '</strong> ';

            if($role->name == 'Administrator') {
                $role->name = 'Editor';
                $role->save();

                echo 'Role Name Updated<br>';
            }
            else{
                echo 'is not Administrator <br>';
            }
        }

   }

});


Route::get('/delete{id}/role{role_id}', function($id, $role_id){

    $user = User::findOrFail($id);

    foreach($user->roles as $role) {
        $role->whereId($role_id)->delete();
    }
});

Route::get('attach/user{id}/role{roll_id}', function($id, $roll_id){

   $user = User::findOrFail($id);

   $user->roles()->attach($roll_id);

});

Route::get('detach/user{id}/role{roll_id}', function($id, $roll_id){

    $user = User::findOrFail($id);

    $user->roles()->detach($roll_id);

});

Route::get('sync/user{id}/a{syn1}b{syn2}c{syn3}', function($id, $syn1, $syn2, $syn3){

    $user = User::findOrFail($id);

    $user->roles()->sync([$syn1, $syn2, $syn3]);

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