<h1> Job List </h1>
<table>
	<thead>
		<tr>
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
		      <td> {{$job->title}} </td>
		      <td> {{$job->location}} </td>
		      <td> {{$job->requirements}} </td>
		      <td> {{$job->salary}} </td>
		      <td> {{$job->created_at}} </td>
		    </tr>
		  @endforeach
	</tbody>
</table>