<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$tglwaktu=date("Y-m-d H:i:s");

include "./config.php";
include "./koneksi.php";

$page=$_REQUEST['page'];

$ses_clnpsb=$_SESSION['sesclnpsb'];

if (isset($_SESSION['sesclnpsb']))
{ 

$id_soal=$_POST['id_soal'];

        //Simpan Data Test
		opendb();
		$qjumlah = "SELECT COUNT(*) FROM test_online WHERE nomor_pendaftaran='$ses_clnpsb'";
		$hjumlah = querydb($qjumlah);
		closedb();
		$djumlah = mysql_fetch_array($hjumlah);

		if($djumlah[0]==0) {
			opendb();
			$query="INSERT INTO test_online (nomor_pendaftaran, mulai, selesai) VALUES ('$ses_clnpsb', '$tglwaktu', '$tglwaktu')";
			querydb($query);
			closedb();
		}
		
		//Ambil kode soal yang barusan disimpan
		opendb();
		$qid_test = "SELECT kode_test FROM test_online WHERE  nomor_pendaftaran='$ses_clnpsb'";
		$hid_test = querydb($qid_test);
		closedb();
		$did_test = mysql_fetch_array($hid_test);

		//simpan jawabannya
		$jml=count($id_soal);
		for($j=0; $j<$jml; $j++) {
			
			$id=$id_soal[$j];
			$jawaban=$_POST["jawab".$id];
			if($jawaban<>"" or $jawaban<>0) { $status=1; }
			else { $status=0; }
			
			opendb();
			$query="INSERT INTO test_online_hasil (kode_test, kode_soal_bank, kode_soal_bank_jawaban, status) 
					VALUES ('$did_test[0]', '$id', '$jawaban', '$status')";
			querydb($query);
			closedb();
		}
		
		$_SESSION['jumlah_satu']=$_SESSION['jumlah_satu'] - $_SESSION['jumlah_soal_perhalaman'];
		
		if($_SESSION['jumlah_satu']==0) { $_SESSION['kat_now']=$_SESSION['kat_now']+1; }
		
		//Jumlah Sekarang
		//$_SESSION['jumlah_sekarang']=$_SESSION['jumlah_sekarang']+$_SESSION['jumlah_soal_perhalaman'];
		$_SESSION['jumlah_sekarang2']=$_SESSION['jumlah_sekarang'];
		//Nomor Sekarang
		$_SESSION['number_sekarang']=$_SESSION['number_sekarang']+$_SESSION['jumlah_soal_perhalaman'];
		//Hapus soal dalam array
		unset($_SESSION['soalsave']);
		
		//Cek apakah soal sudah sama dengan soal maksimal
		if($_SESSION['jml_max']>$_SESSION['jumlah_sekarang2']) {
		?>
		<script language="JavaScript">document.location='test-online.php';</script>
		<?php
		} else {
		?>
		<script language="JavaScript">document.location='index.php?page=test-selesai';</script>
		<?php
		}

}
?>