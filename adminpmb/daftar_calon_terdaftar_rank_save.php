<?php
include "../config.php";
include "../koneksi.php";
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Halaman Belum Cek Syarat
	$stat=$_GET['stat'];
	$nopen=$_GET['id'];
	$pilihan=$_GET['pilihan'];
	$jurusan=$_GET['jurusan'];
	
	if($pilihan==1) {
		opendb();
		$query1="UPDATE tb_pendaftaran SET cek_nilai_lolos_1='$stat' WHERE nomor_pendaftaran='$nopen'";
		querydb($query1);
		closedb();
	} else {
		opendb();
		$query1="UPDATE tb_pendaftaran SET cek_nilai_lolos_2='$stat' WHERE nomor_pendaftaran='$nopen'";
		querydb($query1);
		closedb();
	}
?>
<script language="JavaScript">
document.location='daftar_calon_terdaftar_rank.php?pilihan=<?php echo $pilihan; ?>&jurusan=<?php echo $jurusan; ?>'</script>