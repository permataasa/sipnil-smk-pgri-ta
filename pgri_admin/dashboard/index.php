<!DOCTYPE html>
<html>
<head>
	<title>Halaman Dashboard | (level admin)</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- link ke bootstrap css -->
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../style/css/style.css">
	
</head>
<body>

	<!-- top navbar admin -->
	<?php include '../include/navbar-admin.php'; ?>

	<div class="kotak-konten pt-4">
		<div class="row pt-3 justify-content-end">
			<div class="sidebar col bg-primary" id="sidebar">
				
				<?php include '../include/sidebar-admin.php'; ?>

			</div>
			<div class="konten bg-warning pt-5 pl-5" id="konten">konten</div>
		</div>
	</div>

	<!-- memanggil jquery, popper, dan bootstrap js -->
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../style/js/style.js"></script>

</body>
</html>