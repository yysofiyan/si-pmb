<?php
date_default_timezone_set('Asia/Jakarta');
include "../config.php";
include "../koneksi.php";

$id=$_POST['id'];
$judul=$_POST['judul'];
$isi=$_POST['isi'];
$stat=$_POST['stat'];
$tgl=date("Y")."-".date("n")."-".date("d");

$uploaddir = 'images_info_statis/';
$uploadfile = $uploaddir . $_FILES['gam']['name'];
$gmbar= $_FILES['gam']['name'];

if ($stat=="ubah") {
		opendb();
		if(($_FILES['gam']['name'])<>"") {
			move_uploaded_file($_FILES['gam']['tmp_name'], $uploadfile);
			$query="UPDATE informasi_statis_web SET judul='$judul', isi='$isi', gambar='$gmbar', tanggal='$tgl' WHERE kode_statis='$id'";
		} else {
			$query="UPDATE informasi_statis_web SET judul='$judul', isi='$isi', tanggal='$tgl' WHERE kode_statis='$id'";
		}
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=informasi-static'</script>
<?php
	}
else
	{
?>
		<script language="JavaScript">document.location='index.php?page=informasi-static'</script>
<?php
	}
?>