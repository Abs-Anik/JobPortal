<?php

namespace App\Http\Controllers;
use App\Job;
use App\JobApplication;
use auth;

use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if($request->category) {
          $jobs = Job::where("category", '=', $request->category)->get();
       } 
       else if($request->search) {
         $jobs = Job::where("title", 'like', '%' . $request->search . '%')->get();
       }
       else {
          $jobs = Job::all();
       }
       return view('jobs.index', ['jobs' => $jobs]);
    }

    public function my_jobs() {
        // $jobs = Job::where('user_id', '=', Auth::user()->id)->get();
        $jobs = Auth::user()->jobs()->get();
        return view('jobs.my_jobs', ['jobs' => $jobs]);
    }

    function comments() {
        return $this->hasMany('App\Blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $job = new Job();
       $job->title = $request->title;
       $job->requirements = $request->requirements;
       $job->location = $request->location;
       $job->salary = $request->salary;
       $job->user_id = Auth::user()->id;
       $job->category = $request->category;
       $job->save();
       return redirect('/jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::Find($id);
        return view('jobs.show', ['job' => $job]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function apply($id) {
      $job = Job::Find($id);
      $application = new JobApplication();
      $application->job_id = $job->id;
      $application->user_id = Auth::user()->id;
      $application->save();
      return redirect('/jobs/show/'.$job->id);
    }
}
