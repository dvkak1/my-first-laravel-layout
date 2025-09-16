<?php

namespace App\Http\Controllers;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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

    public function edit(Job $job)
    {
        //FULL DISCLOSURE: All commented out code is code once used to demonstrate the capabilities of
        //Laravel's Gate authorization method and the code not commented out are the cleaner final versions.

        //Note: Do not forget to include use Illuminate\Support\Facades\Gate to implement Gate
        //This code allows the user to access the job if said user belongs to the employer that created the job.

        //This is a way to authorize users.
        //If you are a guest, you will be redirected to the login page.

        // //This determines if the registered user belongs to said employer of created job.
        // //Return a 403 forbidden error if user is not under the employer of created job.
        // if ($job->employer->user->isNot(Auth::user())){
        //    abort(403);
        // }


        //Other authorization methods include
        // Gate::denies('edit-job', $job);
        //Gate::allows('edit-job', $job);
        //These methods are added on the notes section to document all of Jeffrey Way's
        //6 steps to Authorization mastery

         return view('jobs.edit',['job' => $job]);
    }

    public function update(Job $job) {
        //Authorize (On hold...)
        Gate::authorize('edit-job', $job);

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
     Gate::authorize('edit-job', $job);
    //Delete the job
    //   $job = Job::findOrFail($id);
    $job->delete();
    //Redirect
    return redirect('/jobs');
    }
}
