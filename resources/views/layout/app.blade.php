<html>
	<head>
		<title> Job Portal </title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	</head>
	<body>
		<nav>
			<a href='/'> Home </a> | 
			<a href='/jobs'> Jobs </a> | 
			<a href='/jobs/create'> Post a Job </a> | 
			@if(Auth::user()) 
			  <a href='/my_jobs'> My Jobs </a> |
			  <a href='/profile'> My Profile </a> |
			  <a href='/logout'> Logout </a>
			@else
			  <a href='/registration'> Registration </a> |
			  <a href='/login'> Login </a>
			@endif  
		</nav>
		<div class='page-container'>
			@yield('content')
		</div>
	</body>
</html>