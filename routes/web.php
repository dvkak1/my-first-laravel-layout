<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

//This is a route. It defines the root URL of the application and
//returns the 'welcome' view. A route is a way to map URLs to specific
//functionality in a web application.

//SIDENOTE: If you will code Laravel projects, run them via Laragon.
//They can be ran on XAMPP but Jeffrey Way (Laravel guru) recommends Laragon.

//In Video 02 of 30 Days of Laravel, Jeffrey Way talks about keeping it simple.
//Fun fact about KISS: It was coined by Kelly Johnson, lead engineer at the Lockheed Skunk Works.
//He said, "Keep it simple, stupid." The phrase was used in the U.S. Navy in the 1960s.
//The idea is that most systems work best if they are kept simple rather than made complicated.
//Therefore, simplicity should be a key goal in design and unnecessary complexity

//Main point being: Keep your code simple and easy to understand.
//
//Pro tip: You can also navigate to files using the CTRL + P shortcut in VS Code.
//
// Just a while ago, the name and greeting variables are commented out as they are not being used.
// They were simply used for testing the echoing of variables from route to view.
// This is how you echo variables from route to view.


//Welcome to your first Data container class in Laravel. If you see something that starts with
// class -insert whatever word here- {
//
//
//}
//
//This is what a class looks like
//
//
//
//
//

Route::get('/', function()  {
    return view('home');
});




//Pro tip to check if a form works on your Laravel app is to do what we call a "sanity check"
//This code will determine if the app's form is working as it is
// Route::post('/jobs', function(){
//    dd('Hello from the post request');
// });

// Route::post('/jobs', function(){
//    dd(request()->all());
// });



// Route::post('/jobs', function(){
//    Job::create([
//     'title' => request('title'),
//     'salary' => request('salary'),
//     'employer_id' => 1
//    ]);

//    return redirect('/jobs');
// });


// Route::get('/contact', function(){
//     return view(view:'contact');
// });
//You can also use Route::resource to group routes.
Route::resource('jobs',JobController::class);

//This is also another way to use Route::resource
//Route::resource('jobs', JobController::class, [
// 'only' => ['index', 'show', 'create', 'store']
//]);
Route::view('/contact', 'contact');


//To list down all of your routes so far, enter this in your Git CMD terminal:
//php artisan route:list

//To group all of your routes

//Authentication route
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
// The POST method is not supported for route login. Supported methods: GET, HEAD.
// Error message fixed with the code below:
//In short, Login routes require it to be a POST method to match the form submission.
Route::post('/login', [SessionController::class,'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
