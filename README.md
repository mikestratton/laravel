# Introduction to Laravel 5.2

## Laravel is a PHP Framework that uses MVC architecture.  
  
### Model View Controller  
  
Model Database  
View: User Interface (HTML)   
Controller: PHP/Laravel  
  
### Main folders in Laravel:  
app  
app/Http (main folder, contains routes)  
config    
database  
resources  
public  
vendor  
public  (css, javascript, images, etc)  
resources/assets/sass (css preprocessor)  
resources/views (html files, any files used for users/visitors)  
resources/errors  (504 pages, etc)  
tests (unit tests, test driven development)  
vender (extensive dependencies in laravel)  

### Main files in Laravel:  
.env  (used as a security measure, used in config/database.php)  
.gitignore (ignore .env, use templates provided by gitignore.io and github.com    
composer.json (required frameworks)      
app/Http/routes.php  
config/app.php (register classes for packages and/or plugins, Laravel framework service providers)  
config/database.php (database connection by way of .env file)  
config/mail.php (email configuration, smtp, port, etc)  
database/factories/ModelFactory.php (classes used to create content)  
database/seeds/DatabaseSeeder.php (create alot of content for a website)  
gulpfile.js (compile sass into css)  
package.json (required dependencies)  
   
## Routes  
User friendly applications are dependent on use of routes. Routes are in the URL address bar. For example: mydomain.com/contact is related to routes.  
  
Laravel 5.2 Docs, Routes Page: https://laravel.com/docs/5.2/routing   
  
### Routes Examples  
#### Example 1  
Route::get('/', function () {  
    return view('welcome');                   // points to resources/views/welcome.blade.php  
});   
#### Example 2  
Route::get('/about', function () {  
    return "about page goes here";            // returns text  
});  
#### Example 3  
Route::get('/post/{id}', function ($id) {     // myapp.com/laravel/post/12345 returns: ID Number: 12345   
    return "ID Number: " . $id;  
});    
  
### Naming Routes  
#### Example 1  
Route::get('admin/posts/recent/popular', array('as'=>'admin.home' ,function () {  
    $url = route('admin.home');  
    return "this url is " . $url; 
}));  
#### Example 2  
From within bash, cd to root folder and then type(without quotes):  
"php artisan route:list"  
   
## Controllers  
Classes transfer data from Model(database) to the View(UI) as well as transfer data from View to the Model.(i.e. user logs in to site via login page and retrieve their posts, or vistior fills out form and clicks submit).  
  
### Creating Controllers  
Controllers are located in the larvel directory: /app/Http/Controllers  
The Controller.php file located in /app/Http/Controllers/ is the main controller.

#### Keywords
'namespace' does for functions in classes in the same manor that scope does for variables.   
For more information PHP namespaces, check out this tutorial: https://code.tutsplus.com/tutorials/namespacing-in-php--net-27203   
For more information on PHP variables and scopes, take a look at the directory: /docs/php    
'use' imports a specific glass or namespace into the file that it is used in.    
For more information on aliasing/importing with 'use' go to http://uk3.php.net/manual/en/language.namespaces.importing.php   

#### Using Artisan to Create a Controller    
In a terminal, cd to directory of laravel and type(without quotes): "php artisan make:controller YourControllerName"    
To create a CRUD contoller, type(without quotes): "php artisan make:controller --resource YourControllerName"  
To find other commands in artsian, from the terminal, type: "php artisan"  

### Routing Controllers
The following code will route a get request(localhost/post) to a function(@index) within a controller(PostController.php)  
Route::get('/post', 'PostsController@index');  

### Pass Parameters to a Controller  
Example:  
In routes file, add this line:   
Route::get('/post/{id}', 'PostsController@index');  
In your controller, add this function:  
public function index($id)  
    {   
        return "I am passing a variable with the number: " . $id;   
    }   
   
### Resources and Controllers   
The 'resource' method creates special routes that can be used in the controller.  
Using the method 'resource'  
In your routes file, type: Route::resource('posts', 'PostsController');  
Using the get function, as in: Route::get('/posts', 'PostControllers.php@index'); needs to call a specific method.   
The resource function offers full CRUD functionality, and all methods of the controller is passed to the route.  
After creating a Route::resource in your routes file, go to a terminal and type in: "php artisan route:list"  
This will return your routes, including the Route::resource that validates your route has full CRUD functionality.  
![Git Bash returns Routes with Artisan](https://raw.githubusercontent.com/mikestratton/laravel/master/bash_route_list.PNG)  
  
## Views  
Views are located in the directory resources/views/  
  
### Create a Custom View  
1. add a method to your controller file  
2. in your views folder add a php file with the name yourfile.blade.php  
3. in your routes file, add a route that points to the method in your controller file   
  
#### Example Creation of a Custom View
1. In your controller file, add the following method:  
public function contact_view(){  
        return view('contact');  
    }  
2.  In your views folder, create a .php file and name it contact.blade.php   
3. In your routes.php file, add the following code:  
Route::get('/contact', 'PostsController@contact');  

## Blade
Blade is a simple and powerful templating system for laravel.  
Example:  
To echo the variable $myvar, you would use: {{$myvar)   

### Blade Master Template  
Default file name: views/layout/app.blade.php  
  
Learn more about laravel blade engine: https://laravel.com/docs/5.2/blade  

## Laravel Migrations  
"Migrations are like version control for your database, allowing your team to easily modify and share the application's database schema."  

### Default Migrations  
Upon installation, Laravel creates two migrations, located in the database/migrations folder. The migrations are php classes the create user tables and create password resets table. The functions contained in these classes are extensively powerful, allowing for the creation or deletion(drop) of a table.  

### Generating Migrations  
To create a migration, using the migrations located in the database/migrations folder, use the Artisan command:   
php artisan migrate   

### Make a Migration  
To make a migration, type in the command:   
php artisan make:migration create_posts_table --create="posts"   
Naming scheme for the database table should be lowercase with underscores used as spaces to separate words.  
my_database_name   
After using the php artisan make:migration command, you should see a new php file in the migrations folder named: yyyy_mm_dd_tttttt_create_posts_table.php   
Now, use the migrate command to create the table in your database:  
php artisan migrate  
Your terminal should return:  
Migrated: 2017_05_31_011148_create_posts_table  
This can be validated in phpMyAdmin  
To delete the last migration that was created, from your command line type:  
php artisan migration:rollback  
  
### Adding Columns to Existing Tables Using Migrations  
Run the command:  
php artisan make:migration add_is_admin_column_to_posts_tables --table="posts"  
A new migration file should be added to your migrations folder. In the  
function up {  
    Schema::table{  
      //add the line here  
    }  
},    
add the line:  
$table->string('is_admin');  // this is the line to add  
To drop the column, add the line:  
$table->dropColumn('is_admin');  
to the:  
function down, schema::table  
Now, run the command:  
php artisan migrate  
   
Documentation: Database Migrations, Creating Indexes  
https://laravel.com/docs/5.2/migrations#creating-indexes  
  
### Additional Migration Commands  
php artisan migrate:reset //deletes(rolls back) all migrations  
php artisan migreate:refresh  //rolls back and re-runs all migrations. WARNING: This command will delete all data.  
php artisan migrate:status  //shows what migratiosn have ran  

Learn more about laravel migrations: https://laravel.com/docs/5.2/migrations      
  
## Laravel Fundamentals: Raw SQL Queries  
Documentation: https://laravel.com/docs/5.2/database  
These examples are not intended for production use.  
### Create Data 
Route::get('insert', function(){  
      DB::insert('insert into posts(title, content) values(?, ?)', ['PHP with Laravel', 'Laravel is the best thing that ever happened to php']);  
});  
### Read Data  
Route::get('/read', function(){  
    $results = DB::select('select * from posts where id=?', [1]);  
  
    foreach($results as $post){  
        return $post->title;  
    }  
});  
### Update Data  
Route::get('/update', function(){  
    $updated = DB::update('update posts set title="Updated Title" where id=?', [1]);  
    return $updated;  
})  
### Delete Data  
Route::get('/delete', function(){  
   $deleted = DB::delete('delete from posts where id=?', [1]);  
   return $deleted;  
});  

## Laravel Fundamentals: Database, Eloquent/ORM
Documentation: https://laravel.com/docs/5.2/eloquent  
"The Eloquent ORM included with Laravel provides a beautiful, simple ActiveRecord implementation for working with your database. Each database table has a corresponding "Model" which is used to interact with that table. Models allow you to query for data in your tables, as well as insert new records into the table." ~ laravel.com  
### Eloquent, Reading Data  
#### Create a Model  
php artisan make:model Post -m //note up use of Camel(aka pascal) case in naming scheme. -m (creates migration)  
The above model will also create a migration that will be named posts. Models call to lowercase, plural database tables.  
Examples:  
Model 'Post' == Table 'posts'  
Model 'User' == Table 'users'  
Model 'Article' == Table 'articles'  
Model 'Page' == Table 'pages'  
  
If creating a PostAdmin model for the posts table, Laravel would read the PostAdmin model as being tied to the postadmins table. To resolve this, the following code should be used:  
class PostAdmin extends Model  
{  
    protected $table = 'posts';  
}    
Also, by default, a newly created model believes that the attached table has a primary key of 'id'.  
If your primary key is not named 'id', be sure to use a protected view.  
class PostAdmin extends Model  
{  
    protected $primaryKey = 'admin_post_id';    
}   
  
  
## Laravel Fundamentals: Database, Eloquent Relationships
Documentation: https://laravel.com/docs/5.2/eloquent-relationships  
Laravel has several relationships.  
* One to One  
* One to One (inverse)  
* One to Many  
* One to Many (inverse)  
* Many to Many  
* Has Many Through  
* Polymorphic Relations  
* Many To Many Polymorphic Relations  

### One to One Relationship  
Example:  
Route::get('/user/{id}/post', function($id){   
    return User::find($id)->post->content;   
});  
  
### One to One Relationship  (inverse)  
Example:  
Route::get('/post/{id}/user', function($id){  
    return Post::find($id)->user->name;  
});  
  
### One to Many 
Example:  
Route::get('/posts', function(){  
  
    $user = User::find(1);    
  
    foreach($user->posts as $post){   
        echo $post->title . '<br>';   
    }   
});   

### Many to Many
A pivot table is a lookup table. It is a table that defines how tables relate to other tables.  

### Has Many Through
The "has-many-through" relationship provides a convenient short-cut for accessing distant relations via an intermediate relation. For example, a Country model might have many Post models through an intermediate User model. In this example, you could easily gather all blog posts for a given country. Let's look at the tables required to define this relationship:   
Documentation: https://laravel.com/docs/5.2/eloquent-relationships#has-many-through   

### Polymorphic Relations  
Polymorphic relations allow a model to belong to more than one other model on a single association. For example, imagine users of your application can "like" both posts and comments. Using polymorphic relationships, you can use a single likes table for both of these scenarios. First, let's examine the table structure required to build this relationship  
Documentation: https://laravel.com/docs/5.2/eloquent-relationships#polymorphic-relations  

### Many to Many Polymorphic Relations 
Documentation: https://laravel.com/docs/5.2/eloquent-relationships#many-to-many-polymorphic-relations   
  
#### Table Structure   
In addition to traditional polymorphic relations, you may also define "many-to-many" polymorphic relations. For example, a blog Post and Video model could share a polymorphic relation to a Tag model. Using a many-to-many polymorphic relation allows you to have a single list of unique tags that are shared across blog posts and videos.    
   
#### Model Structure  
Next, we're ready to define the relationships on the model. The Post and Video models will both have a tags method that calls the morphToMany method on the base Eloquent class  
    
#### Defining The Inverse Of The Relationship  
Next, on the Tag model, you should define a method for each of its related models. So, for this example, we will define a posts method and a videos method  
  
#### Retrieving The Relationship  
Once your database table and models are defined, you may access the relationships via your models. For example, to access all of the tags for a post, you can simply use the tags dynamic property:   
  
## Laravel Database: Tinker (CRUD)  
Tinker is good for playing around with data before implemeting with routes.  
  
### Create Data with Tinker  
Example: From the command line, type:  
php artisan tinker  
This will return:  
Psy Shell v0.7.2 (PHP 7.0.13 ΓÇö cli) by Justin Hileman  
>>>  
Type in: 
>>> $post = App\Post::create(['title'=>'PHP from tinker','content'=>'Content created from Tinker']);   
Returns:  
=> App\Post {#631  
     title: "PHP from tinker",  
     content: "Content created from Tinker",  
     updated_at: "2017-06-06 08:06:23",  
     created_at: "2017-06-06 08:06:23",  
     id: 3,  
   }  
Type in:  
>>> $post = new App\Post  
Returns:  
=> App\Post {#626}   
Type in:  
>>> $post->title = "new title from this object"  
>>> $post->content = "This content was created from the command line interface using tinker"  
Data has not been saved in database yet.  
To save, type in:  
>>> $post->save();  
Other commands:  
>>> $post = App\Post::find(6);  
>>> $post = App\Post::where('id',2)->first();   
>>> $post = App\Post::whereId(2)->first();  
  
### Update & Delete Data with Tinker  
Example:  
From command line, type:  
>>> $post = App\Post::find(2)  
>>> $post->title = "Changed Post Title with Tinker"  
>>> $post->content = "Change content with ID=2 with Tinke from command line within phpStorm"   
Data is not stored in database.  
Type:  
>>> $post->save();  
Data is now stored in database.  

### Relationships with Tinker  
Tinker can be used to find out how relationships are working.   
Example: User and Posts Relationship  
>>> $user = App\User::Find(1);  
Check User with Post relationship, Type:  
>>> $user->posts  
If the relationship is not set up correctly, a similar message will return:  
Illuminate\Database\QueryException with message 'SQLSTATE[42S22]: Column not found: 1054 Unknown column 'posts.user_id' in 'where clause' (SQL: select * from `posts` where `posts`.`user_id` = 1 and `posts`.`user_id` is not null and `posts`.`deleted_at` is null)
'   
To fix this error, from within your xxxx_xx_xx_xxxxxx_create_posts_table.php script, add the following line:  
$table->integer('user_id')->unsigned();   
Be sure this line is added within Schema{// insert here} inside the up function  
For example:  
public function up()  
    {  
        Schema::create('posts', function (Blueprint $table) {  
            $table->integer('user_id')->unsigned();  
        });  
    }  
    
    
If the relationship between User and Roles are correct, when you type in the command:  
>>> $user->roles     
The command line will return something similar to:  
=> Illuminate\Database\Eloquent\Collection {#650  
     all: [  
       App\Role {#647  
         id: 1,  
         name: "Administrator",  
  
## Database - Eloquent One to One Relationship CRUD   
Separate laravel project, located in the /onetoone directory.  

## Database - Eloquent One to Many Relationship CRUD   
Separate laravel project, located in the /onetomany directory.  

## Database - Eloquent Many to Many Relationship CRUD
Separate laravel project, located in the /manytomany directory.  

## Database - Eloquent Polymorphic Relationship CRUD
Separate laravel project, located in the /polymorphic directory.  

## Database - Eloquent Polymorphic Many to Many Relationship CRUD
Separate laravel project, located in the /polymorphicmanytomany directory.  

## Authenitcation: Form Login  
Separate laravel project, located in the /login directory.  
### Create user authorization, step by step  
1. Install laravel using composer.  
2. Using phpMyAdmin, create an empty database.  
3. Update your connection string in the .env file.  
4. In terminal, type: php artisan migrate  
5. In terminal, type: php artisan make:auth  
#### Laravel Authentication with phpStorm in background:  
![Laravel Authentication in one minute](https://github.com/mikestratton/laravel/blob/master/laravel_authentication.PNG)  

Documentation: https://laravel.com/docs/5.2/authentication  

## HTTP Middleware  
Separate laravel project, located in the /middleware directory.  
Make sure to migrate and add user authorization.  
Authorization:  
php artisan make:auth  

### Registering a Middleware  
To put application in maintenance mode, type:  
php artisan down  
Back online : php artisan up  
### Creation of a Middleware for User Roles  
1. To create a middleware, type:  
php artisan make:middleware  RoleMiddleware // naming convention must follow "FirstCase"  
2. Open file: app/Http/Kernel.php  
3. In kernel.php, add an array member to protected $routeMiddleware:  
'role' => \App\Http\Middleware\RoleMiddleware::class,    
4. In your routes file, add a route:  
Route::get('/admin/user/role', ['middleware'=>'role', function(){  
    return "do something";  
}]);  
4. In RoleMiddleware.php, add to public function handle:  
    return redirect('/');  
5. Create a role model and migration:  
php artisan make:model Role -m  
6. Add columns to migrations:  
In the *_create_users_table:  
$table->integer('role_id');  
In the *_create_roles_table:  
$table->string('name');  
7. In the Role.php file, add:  
protected $fillable = [ 'name', 'email', 'password',];  
8. in the User.php file, add:  
    public function role(){  
      return $this->belongsTo('App\Role');  
    }   
9. php artisan make:middleware IsAdmin  
10. Register new middleware: In Kernel.php, add to protected $routedMiddleware:  
'IsAdmin'     =>    \App\Http\Middleware\IsAdmin::class,  
11. in phpMyAdmin, insert two rows into the Roles table: administrator, subscriber  
12. In the User.php file, add:  
    public function isAdmin(){  
        if($this->role->name == 'administrator'){  
            return true;  
        }  
        return false;  
    }  
13. In phpMyAdmin,  
update `laravel_middleware`.`users` SET `role_id` = '1' WHERE `users`.`id` = 1;  
14. In IsAdmin.php, add to public function handle:   
          $user = Auth::user();  
          if(!$user->isAdmin()){  
            return redirect('/');  
        }   
15. php artisan make:controller AdminController  
16. Add a route:  
Route::get('/admin', 'AdminController$index');  
17. In the AdminController.php file, add:  
    public function __construct()   
    {   
        $this->middleware('IsAdmin');   
    }   
  
    public function index(){   
        return "you are an admin";   
    }    
Documentation: https://laravel.com/docs/5.2/middleware   

## Laravel Sessions
Example:  
In HomeController.php, append public function index():  
 public function index(Request $request)  
    {  
//        $request->session()->put(['mike'=>'senior developer']); // create session  
//        $request->session()->get('mike'); // read session  
//        session(['tina'=>'ceo']); // global function  
//        $request->session()->forget('mike'); delete mike session  
//        $request->session()->flush(); // delete all  
//        return session()->all(); // read all  
//        return view('home');  
    }  
Documentation: https://laravel.com/docs/5.2/session  

## Laravel Sending Email/Api  
Separate laravel project, located in the /mail directory.  
Using MailGun API https://www.mailgun.com/   

### MailGun Configuration  
Laravel required package for sending email: composer require guzzlehttp/guzzle  
1. Signup for an account at mailgun.com   
2. In the .env file:   
change: MAIL_DRIVER=smtp to MAIL_DRIVER=mailgun  
add: MAILGUN_DOMAIN=your mailgun domain  
add: MAILGUN_SECRET=your mailgun secret api key  
Delete: MAIL_HOST=mailtrap.io  
Delete: MAIL_PORT=2525  
Delete: MAIL_USERNAME=null  
Delete: MAIL_PASSWORD=null  
Delete: MAIL_ENCRYPTION=null  
3. In mail.php, append:  
'from' => ['address' => 'your-email@gmail.com', 'name' => 'Your Name'],  
4. The services.php  utilizes configurations set in the .env file.   






Documentation: https://laravel.com/docs/5.2/mail  

### Laravel Helper Functions  
Documentation: https://laravel.com/docs/5.2/helpers

### Upload Plugin  
DropzoneJS: http://www.dropzonejs.com/  
 
In your blade template file:  
a. add @yield('styles') right before closing body tag.   
b. add @yield('scripts') right before closing body tag.  
  
In your view file:   
a. Add below first section:  
@section('styles')  
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.css" class="css">  
@stop  
b. Add to end:  
@section('scripts')  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.1.1/min/dropzone.min.js"></script>  
@stop  

In your controller:  
public function store(Request $request){  
  $file = $request->file('file');  
  $name = time() . $file->getClientOriginalName();  
  $file->move('uploads', $name);
  Photo::create(['file'=>$name]);
}  


    
    
## References:    
https://laravel.com/docs/5.2  
https://laravel.com/api/5.2/index.html   
https://laravelcollective.com/docs/5.2/html  
https://www.jetbrains.com/phpstorm/  
https://www.mailgun.com/  
http://www.dropzonejs.com/  
https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel  

