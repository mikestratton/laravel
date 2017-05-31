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
  
### Additional Migration Commands  
php artisan migrate:reset //deletes(rolls back) all migrations  
php artisan migreate:refresh  //rolls back and re-runs all migrations. WARNING: This command will delete all data.  
php artisan migrate:status  //shows what migratiosn have ran  

  
Documentation: Database Migrations, Creating Indexes  
https://laravel.com/docs/5.2/migrations#creating-indexes




Learn more about laravel migrations: https://laravel.com/docs/5.2/migrations    
    
    
References: https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel  
