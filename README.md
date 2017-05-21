# Introduction to Laravel 5.2

## Laravel is a PHP Framework that uses MVC architecture.  
  
### M Model  
### V VIEW  
### C Controller  

### Model Deals with the database.  
VIEW: Deals with HTML   
Controller: Deals with the VIEW and Model. PHP/laravel is the controller.  

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

    
   
References: https://www.udemy.com/php-with-laravel-for-beginners-become-a-master-in-laravel  
