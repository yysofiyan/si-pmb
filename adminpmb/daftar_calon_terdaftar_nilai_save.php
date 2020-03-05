<?php
include "../config.php";
include "../koneksi.php";
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Halaman Belum Cek Syarat
	$nilai=$_POST['nilai'];
	$nopen=$_POST['nopen'];
	
			opendb();
			$query1="UPDATE tb_pendaftaran SET cek_nilai='$nilai' WHERE nomor_pendaftaran='$nopen'";
			querydb($query1);
			closedb();
		?>
		<script language="JavaScript">alert('Nilai berhasil disimpan.');
		document.location='daftar_calon_terdaftar_nilai.php'</script>