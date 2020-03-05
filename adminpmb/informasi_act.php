<?php
session_start();

date_default_timezone_set('Asia/Jakarta');
include "../config.php";
include "../koneksi.php";

$ses_admnya=$_SESSION['admpsb'];
opendb();
$queryadm="SELECT * FROM panitia WHERE username_panitia='$ses_admnya'";
$hasiladm=querydb($queryadm);
closedb();
$dataadm=mysql_fetch_array($hasiladm);

$id=$_REQUEST['id'];
$judul=$_POST['judul'];
$isi=$_POST['isi'];
$stat=$_REQUEST['stat'];
$tgl=date("Y")."-".date("n")."-".date("d");

$uploaddir = 'images_info/';
$uploadfile = $uploaddir . $_FILES['gam']['name'];
$gmbar= $_FILES['gam']['name'];

if ($stat=="ubah") {
		opendb();
		if(($_FILES['gam']['name'])<>"") {
			move_uploaded_file($_FILES['gam']['tmp_name'], $uploadfile);
			$query="UPDATE informasi SET judul='$judul', isi='$isi', gambar='$gmbar', tanggal='$tgl'  WHERE kode_informasi='$id'";
		} else {
			$query="UPDATE informasi SET judul='$judul', isi='$isi', tanggal='$tgl'  WHERE kode_informasi='$id'";
		}
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Perubahan berhasil disimpan.');
		document.location='index.php?page=informasi'</script>
<?php
	}
elseif ($stat=="tambah") {
		opendb();
		if(($_FILES['gam']['name'])<>"") {
			move_uploaded_file($_FILES['gam']['name'], $uploadfile);
			$query="INSERT INTO informasi (judul, isi, gambar, tanggal, kode_panitia) VALUES ('$judul','$isi','$gmbar','$tgl','$dataadm[0]')";
		} else {
			$query="INSERT INTO informasi (judul, isi, tanggal, kode_panitia) VALUES ('$judul','$isi','$tgl','$dataadm[0]')";
		}
		querydb($query);
		closedb();
		?>
		<script language="JavaScript">alert('Informasi berhasil disimpan.');
		document.location='index.php?page=informasi'</script>
<?php
	}
elseif ($stat=="hapus") {
		opendb();
		$query="DELETE FROM informasi WHERE kode_informasi='$id'";
		querydb($query);
		closedb();
?>
		<script language="JavaScript">document.location='index.php?page=informasi'</script>
<?php
	}
?>