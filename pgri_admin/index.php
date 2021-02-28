<!DOCTYPE html>
<html>
<head>
	<title>Selamat Datang | Login Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- link ke bootstrap css -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

	<!-- style -->
	<style>

		body {
			font-family: "Monaco", Monospace;
		}

	</style>

</head>
<body>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-4 pt-5">
				
				<div class="card mt-5">
					
					<div class="card-header bg-primary">
						
						<div class="card-title font-weight-bold text-white text-center">

							<h1><b>LOGIN</b></h1>

						</div>

					</div>

					<div class="card-body">
						
						<form class="form">
							
							<div class="form-group">
								
								<label for="userid">User ID :</label>
								<input class="form-control" type="text" name="userid" id="userid">

							</div>

							<div class="form-group">
								
								<label for="assword">Password :</label>
								<input class="form-control" type="password" name="password" id="password">

							</div>

							<p><a href="">Lupa Password ?</a></p>

							<!-- <p><button class="btn btn-outline-primary font-weight-bold" type="submit">Login</button></p> -->
                            <p><a class="btn btn-primary" type="button" href="dashboard">Login</a> </p>

						</form>

					</div>

				</div>

			</div>
		</div>
	</div>

	<!-- memanggil jquery, popper dan bootstrap js -->
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>