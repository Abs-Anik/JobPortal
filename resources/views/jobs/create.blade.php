<?php use App\Job ?>
@extends('layout.app')
@section('content')
<h1>
	Post New Job
</h1>
<form action='/jobs/store' method="post">
	@csrf
	<div>
		<label>Title</label> <br/>
		<input type="text" name="title">
	</div>
	<div>
		<label>Location</label> <br/>
		<input type="text" name="location">
	</div>
	<div>
		<label>Category</label> <br/>
		<select name='category'>
			@foreach(Job::JOB_CATEGORY as $key => $value)
			  <option value='{{$key}}'> {{$value}} </option>
			@endforeach
		</select>
	</div>
	<div>
		<label>Requirements</label> <br/>
		<textarea name="requirements"></textarea>
	</div>
	<div>
		<label>Salary</label> <br/>
		<input type="text" name="salary">
	</div>
	<div>
		<button type="submit"> Create </button>
	</div>
</form>
@endsection