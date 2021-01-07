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
				<h2>Update student data</h2>
				
				@include('validation')
				
				<form action="{{ url('student-add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text" value="{{ $edit_student -> name }}">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text" value="{{ $edit_student -> email }}">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text" value="{{ $edit_student -> cell }}">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text" value="{{ $edit_student -> uname }}">
					</div>
					<div class="form-group">
						<label for="">Photo</label>
						<img class="shadow" style="width: 150px; height: 150px; display: block; margin-bottom: 20px;" src="{{ URL::to('/') }}/media/students/{{ $edit_student -> photo }}" alt="">
						<input name="old_photo" class="form-control" type="hidden" value="{{ $edit_student -> photo }}">
					</div>
                    <div class="form-group">
                        <input name="new_photo" class="form-control" type="file">
                    </div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Update student data">
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
