<?php
date_default_timezone_set('Asia/Jakarta');
require_once '../action/config.php';
include "proses_input.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Data Guru | (level admin)</title>
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

				<form class="form" action="" method="GET">

                    <div class="row justify-content-center">
		
                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <?php
                                    if (isset($_GET['keterangan_nilai'])) {
                                        $totalTugas = $hnilai->countDataCustom('keterangan_nilai',['kode_pelajaran','kode_kelas','semester','tahun_ajaran'],[$_GET['kode_pelajaran'],$_GET['kode_kelas'],$_GET['semester'],$_GET['tahun_ajaran']],'tugas')['keterangan_nilai'];
                                        if ($_GET['keterangan_nilai']=="UTS") {$ket = "UTS";}elseif($_GET['keterangan_nilai']=="UAS"){$ket = "UAS";}else{if($_GET['keterangan_nilai']==""){$ket = "";}else{$ket = "TGS" . $totalTugas += 1;}}
                                    $id_nilai = $ket.$_GET['kode_kelas'].$_GET['kode_pelajaran'].$_GET['kode_jurusan'].$_GET['semester'].date('d').date('m').date('Y');}else{$id_nilai = "";}

                                ?>

                                <label for="id_nilai">ID Nilai :</label>
                                <input class="form-control" type="text" name="id_nilai" id="id_nilai" value="<?php echo $id_nilai?>">
                                
                            </div>

                        </div>
                        
                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <?php 
                                    if (isset($_GET['keterangan_nilai'])) {if ($_GET['keterangan_nilai']!="") {$text = $_GET['keterangan_nilai'];}else{$text = "";}}else{$text = "";}
                                ?>

                                <label for="keterangan_nilai">Keterangan Nilai :</label>
                                <input class="form-control" type="text" name="keterangan_nilai" id="keterangan_nilai" placeholder="contoh : tugas 1 / UTS / UAS" value='<?php echo $text?>'>
                                
                            </div>

                        </div>

                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <label for="kode_pelajaran">Pelajaran :</label>
                                <select class="form-control" name="kode_pelajaran" id="kode_pelajaran" onchange="submit()">

                                    <option value="">-- Pelajaran --</option>
                                    <?php
                                        
                                        foreach ($pelajaran->getAll() as $row) {

                                            if (isset($_GET['kode_pelajaran'])) {if ($_GET['kode_pelajaran']==$row['kode_pelajaran']) {$text = "selected";}else{$text = "";}}
                                            
                                            echo "<option value='$row[kode_pelajaran]' $text>$row[pelajaran]</option>";

                                        }

                                    ?>

                                </select>
                                
                            </div>

                        </div>
                        
                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <label for="kode_guru">Guru :</label>
                                <select class="form-control" name="kode_guru" id="kode_guru" onchange="submit()">

                                    <option value="">-- Guru --</option>
                                    <?php
                                    foreach ($guru->getAll() as $row) {

                                        if (isset($_GET['kode_guru'])) {if ($_GET['kode_guru']==$row['kode_guru']) {$text = "selected";}else{$text = "";}}

                                        echo "<option value='$row[kode_guru]' $text>$row[nama_depan] $row[nama_belakang]</option>";

                                    }
                                    ?>

                                </select>
                                
                            </div>

                        </div>

                    </div>

                    <div class="row justify-content-center">

                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <label for="kode_kelas">Kelas :</label>
                                <select class="form-control" name="kode_kelas" id="kode_kelas" onchange="submit()">

                                    <option value="">-- Kelas --</option>
                                    <?php
                                    foreach ($kelas->getAll() as $row) {

                                        if (isset($_GET['kode_kelas'])) {if ($_GET['kode_kelas']==$row['kode_kelas']) {$text = "selected";}else{$text = "";}}

                                        echo "<option value='$row[kode_kelas]' $text>$row[kelas] ($row[tingkat])</option>";

                                    }
                                    ?>

                                </select>
                                
                            </div>

                        </div>
                        
                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <label for="kode_jurusan">Jurusan :</label>
                                <select class="form-control" name="kode_jurusan" id="kode_jurusan" onchange="submit()">

                                    <option value="">-- Jurusan --</option>
                                    <?php

                                    foreach ($jurusan->getAll() as $row) {
                                        
                                        if (isset($_GET['kode_jurusan'])) {if ($_GET['kode_jurusan']==$row['kode_jurusan']) {$text = "selected";}else{$text = "";}}

                                        echo "<option value='$row[kode_jurusan]' $text>$row[jurusan]</option>";

                                    }
                                    ?>

                                </select>
                                
                            </div>

                        </div>

                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <label for="semester">Semester</label>
                                <select class="form-control" name="semester" id="semester" onchange="submit()">
                                    <?php

                                        echo "<option value=''>-- Semester --</option>";
                                        $semester = [1,2];

                                        for ($i=0; $i < count($semester) ; $i++) { 

                                            if (isset($_GET['semester'])) {if ($_GET['semester']==$semester[$i]) {$text = "selected";}else{$text = "";}}

                                            echo "<option value='$semester[$i]' $text>Semester $semester[$i]</option>";

                                        }

                                    ?>
                                </select>
                                
                            </div>

                        </div>


                        
                        <div class="col-lg-3">
                            
                            <div class="form-group">

                                <label for="tahun_ajaran">Tahun Ajaran</label>
                                <select class="form-control" name="tahun_ajaran" id="tahun_ajaran" onchange="submit()">
                                    <?php

                                        echo "<option value=''>-- Tahun Ajaran --</option>";
                                        $currentYear = date('Y');
                                        $startYear = 2018;

                                        for ($i=$currentYear; $i > $startYear-1 ; $i--) { 
                                            
                                            $n = $i + 1;

                                            if (isset($_GET['tahun_ajaran'])) {if ($_GET['tahun_ajaran']=="$i / $n") {$text = "selected";}else{$text = "";}}

                                            echo "<option value='$i / $n' $text>$i / $n</option>";

                                        }

                                    ?>
                                </select>
                                
                            </div>

                        </div>

                    </div>                    

                </form>

                <form class="form" action="" method="POST">

                    <?php
                    if(isset($_GET['keterangan_nilai'])){
                        echo "<input type='text' name='id_nilai' value='$_GET[id_nilai]'>";
                        echo "<input type='text' name='keterangan_nilai' value='$_GET[keterangan_nilai]'>";
                        echo "<input type='text' name='kode_pelajaran' value='$_GET[kode_pelajaran]'>";
                        echo "<input type='text' name='kode_guru' value='$_GET[kode_guru]'>";
                        echo "<input type='text' name='kode_kelas' value='$_GET[kode_kelas]'>";
                        echo "<input type='text' name='kode_jurusan' value='$_GET[kode_jurusan]'>";
                        echo "<input type='text' name='semester' value='$_GET[semester]'>";
                        echo "<input type='text' name='tahun_ajaran' value='$_GET[tahun_ajaran]'>";
                    }
                    ?>

                    <table class="display table table-bordered" id="dataTables" width="100%">
                                            
                        <thead>
                            
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Nilai</th>
                            </tr>

                        </thead>

                        <tbody>
                            
                            <?php

                            $no = 1;
                            $dataSiswa = $siswa->getAll();
                            if (isset($_GET['kode_kelas'])) {
                                $dataSiswa = $siswa->getByCondition(['kode_kelas','kode_jurusan','tahun_ajaran'],[$_GET['kode_kelas'],$_GET['kode_jurusan'],$_GET['tahun_ajaran']]);
                            }
                            
                            foreach ($dataSiswa as $row) {
                                
                                echo "<tr class='text-center'>";
                                echo "<td>" . $no++ . "</td>";
                                echo "<td>" . $row['nis'] . " <input type='text' name='nis[]' value='$row[nis]'></td>";
                                echo "<td>" . $row['nama_depan'] . " " . $row['nama_belakang'] . "</td>";
                                echo "<td>";
                                echo "<input class='form-control' type='text' name='nilai[]'>";
                                echo "</td>";
                                echo "</tr>";

                            }
                            ?>

                        </tbody>

                    </table>

                    <input class="btn btn-outline-primary" type="submit" name="input-nilai" value="Submit">

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