<?php
date_default_timezone_set('Asia/Jakarta');
include "../config.php";
include "../koneksi.php";
$sekarang=date("Y-m-d H:i:s");
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Form Pendaftaran
	$stat=$_GET['stat'];
	$nopen=$_GET['id'];
	
	opendb();
	$q = "UPDATE tb_pendaftaran SET cek_tinggi='$stat' WHERE nomor_pendaftaran='$nopen'";
	$h = querydb($q);
	closedb();

header("location:daftar_calon_terdaftar.php");
?>