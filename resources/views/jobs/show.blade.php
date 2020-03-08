@extends('layout.app')
@section('content')
<h1> Job Details </h1>
<h2> {{$job->title}} </h2>
@if(Auth::user())
	@if(Auth::user()->applied($job->id))
	  Already Applied
	@else
	  <a href='/jobs/{{$job->id}}/apply'>
		Apply Now
	  </a>
	@endif

	@if($job->user_id == Auth::user()->id)
	    @foreach($job->applications as $application) 
	      <h1> Apply: {{$application->user->name}} </h1>
	    @endforeach
    @endif
@else
  <a href='/login'> Login for apply </a>
@endif
@endsection