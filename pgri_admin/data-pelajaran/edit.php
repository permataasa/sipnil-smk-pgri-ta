<?php
require_once "../action/config.php";
include "proses_edit.php";

$dataPelajaran = $pelajaran->getById('kode_pelajaran',$_GET['kode_pelajaran']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Data pelajaran | (level admin)</title>
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

				<form class="form" action="" method="POST">

                    <div class="row justify-content-center">

                        <div class="col-lg-4">

                            <div class="form-group">

                                <label for="kode_pelajaran">Kode Pelajaran  :</label>
                                <input class="form-control" type="text" name="kode_pelajaran" id="kode_pelajaran" value="<?php echo $dataPelajaran['kode_pelajaran']?>">

                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-lg-4">

                            <div class="form-group">

                                <label for="pelajaran">Pelajaran  :</label>
                                <input class="form-control" type="text" name="pelajaran" id="pelajaran" value="<?php echo $dataPelajaran['pelajaran']?>">

                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-lg-4">

                            <div class="form-group">

                                <label for="kkm">KKM  :</label>
                                <input class="form-control" type="text" name="kkm" id="kkm" value="<?php echo $dataPelajaran['kkm']?>">

                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center mb-5">

                        <div class="col-lg-4">

                            <div class="form-group">

                                <input class="btn btn-outline-primary font-weight-bold" type="submit" name="edit-pelajaran" value="Simpan">

                            </div>

                        </div>

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