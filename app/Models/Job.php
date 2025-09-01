<?php
namespace App\Models;

// Call to undefined method App\Models\Job::factory() error took place so the
// solution was to manually include this line of code:
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
//When naming models, keep your class names at a singular naming convention.
//For example, name the class as Job or JobListing
//
//Do not forget to save your tables in the TablePlus environment
//
//Laravel provides safety and security outside of the box. It often tells its developers to be careful with mass
//assigning. You will be dealing with form requests which will be dealt with later.
//
//To navigate around the command prompt space of Git CMD and create new data. You can use php artisan tinker to
//create new doctored data on your database for testing.
//
//App\Models\-model name-::create(['column name', 'data_name'])
//
//Then press enter.
//
//To fetch all data in your database table, type
//
//App\Models\-model name-::all()
//
//Research on the php artisan tinker command.
//
//To create a new model via php artisan, type this:
//
//php artisan make:model -model name-
//
class Job extends Model{

   use HasFactory;
   protected $table = 'job_listings';

   protected $fillable = ['title', 'salary'];


   //This code is added when we started learning about database relationship integration into
   //Laravel. In this case, an employer can have as many job openings.
   //
   //We are about to play around with selecting data using php artisan tinker.
   //
   // We can actually select data via the Git CMD terminal in a lot of ways. Let's say we were to type:
   // $job = App\Models\Job::first()
   //
   //This fetches the first row in the jobs table.
   //
   //$job->employer;
   //
   // This fetches all data from the employer table.
   //
   //$job->employer->name;
   //
   // This other example shows that you select all employers by name ONLY.
   //
   public function employer(){
    return $this->belongsTo(Employer::class);
   }
}
?>
