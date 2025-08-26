<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

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


//You can also return arrays or strings directly from routes.
Route::get('/jobs', function ()  {
      return view('jobs', [
         'jobs' => Job::all()
    ]);
});

//This route dump and dies using the ID parameter from the URL which fetches all the hardcoded data in the jobs
//route.
Route::get('/jobs/{id}', function ($id)  {

    //Laravel includes an Arr class which stands for array which gives countless methods that works with arrays.
    //Below is a first example, as with other commented out code. Comment or uncomment to test and play around.
    // \Illuminate\Support\Arr::first($jobs, function($job) use ($id) {
    //     return $job['id'] == $id;
    // });

    //Here is another example using the arrow function syntax.
    // \Illuminate\Support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    //
    // Try uncommenting the code below to see the result.
    //
    // $job = \Illuminate\Support\Arr::first($jobs, fn($job) => $job['id'] == $id);
    // dd($job);

    //In the words of Jeffrey Way, if it feels weird. it probably is and everything feels weird at first.
    //So if you feel weird about the code above, it is okay. Just keep practicing.
    //

    $job = Job::find($id);

    return view('job',['job' => $job]);

});
Route::get('/contact', function(){
    return view(view:'contact');
});
