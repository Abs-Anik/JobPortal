@extends('layout.app')
@section('content')
<div class="container">
	<h1> My Job List </h1>
		<table class='table'>
			<thead>
				<tr>
					<th> ID </th>
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
				      <td> {{$job->title}} </td>
				      <td> {{$job->location}} </td>
				      <td> {{$job->requirements}} </td>
				      <td> {{$job->salary}} </td>
				      <td> {{$job->created_at}} </td>
				      <td> 
		                <a href='/jobs/show/{{$job->id}}'> Details </a>
		                <a href='/jobs/show/{{$job->id}}'> Edit </a>
		                <a href='/jobs/show/{{$job->id}}'> Delete </a>
				      </td>
				    </tr>
				  @endforeach
			</tbody>
		</table>
</div>
@endsection