<?php

namespace App\Http\Controllers;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
      $jobs = Job::with('employer')->latest()->paginate(perPage: 3);

      return view('jobs.index', [
         'jobs' => $jobs
    ]);


    }

    public function create() {
      return view('jobs.create');
    }

    public function show(Job $job) {
     return view('jobs.show',['job' => $job]);
    }

    public function store() {
       //Validation code
        request()->validate([
                'title' => ['required', 'min: 3'],
                'salary' => ['required']
        ]);

        //This is the code used to insert data and all backend activity is controlled in routing.
            Job::create([
                'title' => request('title'),
                'salary' => request('salary'),
                'employer_id' => 1
            ]);

            return redirect('/jobs');

    }

    public function edit(Job $job) {
         return view('jobs.edit',['job' => $job]);
    }

    public function update(Job $job) {
        //Authorize (On hold...)

        //Validate (Always remember to never trust the user but always validate.)
        request()->validate([
            'title' => ['required', 'min: 3'],
            'salary' => ['required']
        ]);


    //Update the job and persist
    //Below is the commented out version that does not use the route model binding version of a route.
    //    $job = Job::findOrFail($id);
    //^findOrFail is a method found in PHP Laravel's framework used to retrieve a single record from the database
    //based on the primary key (typically the id).

    $job->title = request('title');
    $job->title = request('salary');
    $job->save();
    $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
    ]);
    //Redirect to the job page
    return redirect('/jobs/'. $job->id);
    }

    public function destroy(Job $job) {
    //Authorize (on hold)
    //Delete the job
    //   $job = Job::findOrFail($id);
    $job->delete();
    //Redirect
    return redirect('/jobs');
    }
}
