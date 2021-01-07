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



	<div class="wrap ">
        <a class="btn btn-sm btn-primary" href="{{ url('student-all') }}">All students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add new student</h2>
				
				@include('validation')
				
				<form action="{{ url('student-add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text" value="{{ old('name') }}">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text" value="{{ old('email') }}">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text" value="{{ old('cell') }}">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text" value="{{ old('uname') }}">
					</div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input name="photo" class="form-control" type="file">
                    </div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add student">
					</div>
				</form>
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
