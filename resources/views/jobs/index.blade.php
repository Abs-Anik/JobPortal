<?php use App\Job ?>
@extends('layout.app')
@section('content')
<div class="container">
    <div class="col-lg-12">
		<div class='row'>
			<div class='col-sm-9'>
			<h1> Job List </h1>
			<div class='form-group'>
          <form>
            <input type='text' name='search' placeholder='search'/>
            <input type='submit' value='Search'/>
          </form>
		</div>
				<table class='table'>
					<thead>
						<tr>
							<th> ID </th>
							<th> ORG </th>
							<th> Title </th>
							<th> Location </th>
							<th> Requirements </th>
							<th> Salary </th>
							<th> Posted At </th>
						</tr>
					</thead>
					<tbody>
						  @foreach ($jobs as $job)
						    <tr>
						      <td> {{$job->id}} </td>
						      <td> {{$job->user->name}} </td>
						      <td> {{$job->title}} </td>
						      <td> {{$job->location}} </td>
						      <td> {{$job->requirements}} </td>
						      <td> {{$job->salary}} </td>
						      <td> {{$job->created_at}} </td>
						      <td> 
				                <a href='/jobs/show/{{$job->id}}'> Details </a>
						      </td>
						    </tr>
						  @endforeach
					</tbody>
				</table>
		    </div>
		    <div class='col-sm-3'>
		    	<h3> Job Category </h3>
		    	<ul>
		    		@foreach(Job::JOB_CATEGORY as $key => $value)
					  <li> 
					    <a href='/jobs?category={{$key}}'> {{$value}} </a> 
					  </li>
					@endforeach
		    	</ul>
		    </div>
		</div>
	</div>
</div>
@endsection