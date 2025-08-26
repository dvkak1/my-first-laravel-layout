<?php
namespace App\Models;
//This is an example of a model class in Laravel.
//A part of an architectural pattern called MVC (Model-View-Controller) which is used for developing user
//interfaces dividing related program logic into three interconnected elements.
//This is the Model part of MVC. The model manages data, logic and rules of the application.
//
//Full disclaimer: This is not the most elegant way to create a model in Laravel but for the purposes of
//this tutorial. Let's leave this here for now.
//
//The folder structure once again shows how frameworks organizes files and keeps code clean and easy to find.
//
//If your program sandbox is still working the way it does, congratulations. You are now using MVC principles
//to organize your code even more.
//
// For the usage of arrays, please review about Arrays especially Associative arrays as they are what's mostly used
// in model code.
//
class Job {
    public static function all() {
        return [
         [
                'id' => 1, //The ID number will be used for the URL parameter in the job details page.
                'title' => "Web Developer",
                'salary' => "PHP 30,000"
         ],
         [
            'id' => 2,
            'title' => "Web Designer",
            'salary' => "PHP 25,000"
         ]
    ];

    }

    public static function find (int $id) {
       $job = \Illuminate\Support\Arr::first(static::all(), fn($job) => $job['id'] == $id);

       //This code will utilize a verifier to determine whether this job is available or not or else it will return
       //as null through the usage of a 404 page.
       if(! $job) {
        abort(404);
       }
    }

}
?>
