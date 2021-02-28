<?php
require_once '../action/config.php';
include 'proses_hapus.php';
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

	<!-- <?php include '../include/navbar-admin.php'; ?> -->

	<div class="kotak-konten pt-4">
		<div class="row pt-3 justify-content-end">

			<div class="sidebar col bg-primary" id="sidebar">
				
				<?php include '../include/sidebar-admin.php'; ?>

			</div>

			<div class="konten pt-5 pl-5 pr-5" id="konten">

                <form class="form" action="" method="POST">

                    <table class="display table table-bordered" id="dataTables" width="100%">

                        <thead>

                            <tr class="text-center">
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Tools</th>
                            </tr>

                        </thead>

                        <tbody>
                            
                            <?php

                            $dataGuru = $guru->getAll();
                            $no = 1;

                            foreach ($dataGuru as $row) {
                                
                                $jk = "";
                                if ($row['jenis_kelamin']=="L") {$jk = "Laki-laki";}else{$jk = "Perempuan";}

                                echo "<tr class='text-center'>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row['nama_depan'] . " " . $row['nama_belakang'] . "</td>";
                                echo "<td>" . $jk . "</td>";
                                echo "<td>" . $row['alamat'] . "</td>";
                                echo "<td>";
                                echo "<div class='form-check'>";
                                echo "<input class='form-check-input' type='checkbox' name='kode_guru[]' value='" . $row['kode_guru'] . "'>";
                                echo "</div>";
                                echo "</td>";
                                echo "</tr>";

                            }
                            ?>

                        </tbody>

                    </table>

                    <div>

                        <input class="btn btn-outline-danger font-weight-bold" type="submit" name="hapus-guru" value="Hapus">

                    </div>

                </form>

            
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