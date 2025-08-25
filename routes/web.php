<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('home');
});


//You can also return arrays or strings directly from routes.
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function(){
    return view(view:'contact');
});
