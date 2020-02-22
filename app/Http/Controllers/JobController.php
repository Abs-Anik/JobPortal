<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
    function index() {
    	$jobs = Job::all();
    	return view('jobs.index', ['jobs' => $jobs]);
    }

    function new() {
        return view('jobs.new');
    }

    function create(Request $request) { 
      $job = new Job();
      $job->title = $request->title;
      $job->requirements = $request->requirements;
      $job->location = $request->location;
      $job->salary = $request->salary;
      $job->user_id = 1;
      $job->save();
      return redirect('/jobs');
    }
}
