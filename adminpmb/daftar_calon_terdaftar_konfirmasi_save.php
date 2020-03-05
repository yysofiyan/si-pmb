<?php
include "../config.php";
include "../koneksi.php";
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Halaman Belum Cek Syarat
	$id=$_GET['id'];
	$stat=$_GET['stat'];
	$idx=$_GET['idx'];
	
			opendb();
			$query1="UPDATE konfirmasi_pembayaran SET status='$stat' WHERE kode_konfirmasi_pembayaran='$id'";
			querydb($query1);
			closedb();
			
			opendb();
			$query1="UPDATE tb_pendaftaran SET cek_pembayaran='$stat' WHERE nomor_pendaftaran='$idx'";
			querydb($query1);
			closedb();
		?>
		<script language="JavaScript">alert('Verifikasi berhasil disimpan.');
		document.location='daftar_calon_terdaftar_konfirmasi.php'</script>