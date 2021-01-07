<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
</head>
<body>

	<div class="wrap">
        <a class="btn btn-sm btn-primary" href="{{ url('student-all') }}">All students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Single student of : {{ $single_student -> name }}</h2>
				<img class="shadow" style="width: 200px; height: 200px; display: block; margin: auto; border-radius: 50%; border: 10px solid #fff;" src="{{ URL::to('/') }}/media/students/{{ $single_student -> photo }}" alt="">
				<h3>Ruhul Amin</h3>
				<table class="table table-striped">
					<tr>
						<td>Name :</td>
						<td>{{ $single_student -> name }}</td>
					</tr>
					<tr>
						<td>Email :</td>
						<td>{{ $single_student -> email }}</td>
					</tr>
					<tr>
						<td>Cell :</td>
						<td>{{ $single_student -> cell }}</td>
					</tr>
					<tr>
						<td>Username :</td>
						<td>{{ $single_student -> uname }}</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<!-- JS FILES  -->
	<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
	<script src="{{ asset('assets/js/popper.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>
