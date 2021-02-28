<?php
require_once '../action/config.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Data Admin | (level admin)</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="../style/css/style.css">

</head>
<body>

	<?php include '../include/navbar-admin.php'; ?>

	<div class="kotak-konten pt-4">
		<div class="row pt-3 justify-content-end">

			<div class="sidebar col bg-primary" id="sidebar">
				
				<?php include '../include/sidebar-admin.php'; ?>

			</div>

			<div class="konten pt-5 pl-5 pr-5" id="konten">

				<table class="display table table-bordered" id="dataTables" width="100%">

					<thead>

						<tr class="text-center">
							<th>No</th>
							<th>Nama Lengkap</th>
							<th>Jenis Kelamin</th>
							<th>Level Admin</th>
							<th>Tools</th>
						</tr>

					</thead>

					<tbody>
						
						<?php

						$dataAdmin = $admin->getAll();
						$no = 1;

						foreach ($dataAdmin as $row) {
							
							if ($row['jenis_kelamin']=="L") {$jk = "Laki-laki";}else{$jk = "Perempuan";}

							echo "<tr class='text-center'>";
							echo "<td>" . $no++ . "</td>";
							echo "<td>" . $row['nama_depan'] . " " . $row['nama_belakang'] . "</td>";
							echo "<td>" . $jk . "</td>";
							echo "<td>" . $row['level_admin'] . "</td>";
							echo "<td><a class='btn btn-outline-info' type='button' href='edit.php?id_admin=" . $row['id_admin'] . "'>Edit</a></td>";
							echo "</tr>";

						}
						?>

					</tbody>

				</table>

				<div>

					<a class="btn btn-outline-primary font-weight-bold" type="button" href="input.php">Input Admin</a>
					<a class="btn btn-outline-danger font-weight-bold" type="button" href="hapus.php">Hapus</a>

				</div>
            
			</div>

		</div>
	</div>

	<!-- memanggil jquery, popper, dan bootstrap js -->
	<script type="text/javascript" src="../bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../bootstrap/js/dataTables.min.js"></script>
	<script type="text/javascript" src="../style/js/style.js"></script>

</body>
</html>