<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="crud/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="crud/assets/css/style.css">
	<link rel="stylesheet" href="crud/assets/css/responsive.css">
</head>
<body>



	<div class="wrap ">
        <a class="btn btn-sm btn-primary" href="{{ url('crud-all') }}">All students</a>
		<div class="card shadow">
			<div class="card-body">
				<h2>Add new student</h2>
				<form action="{{ url('crud-add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <input name="photo" type="file">
                    </div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" value="Add student">
					</div>
				</form>
			</div>
		</div>
	</div>








	<!-- JS FILES  -->
	<script src="crud/assets/js/jquery-3.4.1.min.js"></script>
	<script src="crud/assets/js/popper.min.js"></script>
	<script src="crud/assets/js/bootstrap.min.js"></script>
	<script src="crud/assets/js/custom.js"></script>
</body>
</html>