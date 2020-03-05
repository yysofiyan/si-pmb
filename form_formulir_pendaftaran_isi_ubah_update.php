<?php
include "./config.php";
include "./koneksi.php";
$simpan=$_POST['simpan'];
$stat=$_POST['stat'];
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Form Pendaftaran
	$nomorpendaftaran=$_POST['nopen'];
	$satu=$_POST['satu'];
	$dua=$_POST['dua'];
	$tiga=$_POST['tiga'];
	$tiga=$_POST['tiga3']."-".$_POST['tiga2']."-".$_POST['tiga1'];
	//$empat=$_POST['empat'];
	$lima=$_POST['lima'];
	$lima1=$_POST['lima1'];
	$enam=$_POST['enam'];
	$tujuh=$_POST['tujuh'];
	$delapan=$_POST['delapan'];
	$sembilan=$_POST['sembilan'];
	$sepuluh=$_POST['sepuluh'];
	$sebelas=$_POST['sebelas'];
	$duabelas=$_POST['duabelas'];
	$tigabelas=$_POST['tigabelas'];
	$empatbelas=$_POST['empatbelas'];
	$limabelas=$_POST['limabelas'];
	$enambelas=$_POST['enambelas'];
	$tujuhbelas=$_POST['tujuhbelas'];
	$delapanbelas=$_POST['delapanbelas'];
	$pass=md5($_POST['pass']);
	$kode_mapel=$_POST['kode_mapel'];
	$nilai=$_POST['nilai'];
//1. Buat Nomor Pendaftaran Dulu..
//2. Simpan Pendaftaran
		if ($simpan=="oke") {	
		$tglsekarang=date("Y")."-".date("m")."-".date("d")." ".date('H:i:s');
		//auto umur
		function datediff($tgl1, $tgl2){
			 $tgl1 = (is_string($tgl1) ? strtotime($tgl1) : $tgl1);
			 $tgl2 = (is_string($tgl2) ? strtotime($tgl2) : $tgl2);
			 $diff_secs = abs($tgl1 - $tgl2);
			 $base_year = min(date("Y", $tgl1), date("Y", $tgl2));
			 $diff = mktime(0, 0, $diff_secs, 1, 1, $base_year);
			 return array( "years" => date("Y", $diff) - $base_year,
			"months_total" => (date("Y", $diff) - $base_year) * 12 + date("n", $diff) - 1,
			"months" => date("n", $diff) - 1,
			"days_total" => floor($diff_secs / (3600 * 24)),
			"days" => date("j", $diff) - 1,
			"hours_total" => floor($diff_secs / 3600),
			"hours" => date("G", $diff),
			"minutes_total" => floor($diff_secs / 60),
			"minutes" => (int) date("i", $diff),
			"seconds_total" => $diff_secs,
			"seconds" => (int) date("s", $diff)  );
		 }
		 $a = datediff($tiga, date("Y-m-d"));
		 //end auto umur
		opendb();
		$query="UPDATE psb_pendaftaran SET
					nama='$satu', tempat_lahir='$dua', tanggal_lahir='$tiga', umur=$a[years], jenis_kelamin='$lima', agama='$enam', alamat_calon='$tujuh', asal_sekolah='$delapan', 
					asal_sekolah_kecamatan='$sembilan', asal_sekolah_kabupaten='$sepuluh', asal_sekolah_propinsi='$sebelas', nama_orang_tua='$duabelas', pekerjaan_orang_tua='$tigabelas', 
					alamat_orang_tua='$empatbelas', nama_wali='$limabelas', pekerjaan_wali='$enambelas', alamat_wali='$tujuhbelas', telah_mendaftar_di='$delapanbelas'
				WHERE nomor_pendaftaran='$nomorpendaftaran'";
		querydb($query);
		closedb();
//3. Simpan juga nilai UAN nya..
  		$jml = count($kode_mapel);
		for ($i=0;$i<$jml;$i++) {
			opendb();
			$query1="UPDATE psb_nilai_mapel SET nilai='$nilai[$i]' WHERE kode_mapel='$kode_mapel[$i]' and nomor_pendaftaran='$nomorpendaftaran'";
			querydb($query1);
			closedb();
		} ?>
			<script language="JavaScript">alert('Data Diri sudah berhasil dirubah, sekarang sudah tidak bisa dirubah lagi.');
			document.location='index.php?page=formulir-isi'</script>
		  <?php
		}
?>