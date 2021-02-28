<?php
$servername = "localhost";
$dbname = "smk_pgri11";
$username = "root";
$password = "";

try {
    

    $connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    
    echo $e->getMessage();

}

include_once 'model.php';
include_once 'admin.php';
include_once 'guru.php';
include_once 'jurusan.php';
include_once 'kelas.php';
include_once 'siswa.php';
include_once 'pelajaran.php';
include_once 'header_nilai.php';
include_once 'detail_nilai.php';

$model = new Model($connect);
$admin = new Admin($connect);
$guru = new Guru($connect);
$jurusan = new Jurusan($connect);
$kelas = new Kelas($connect);
$siswa = new Siswa($connect);
$pelajaran = new Pelajaran($connect);
$hnilai = new HeaderNilai($connect);
$dnilai = new DetailNilai($connect);