<?php
include "../config.php";
include "../koneksi.php";
$simpan=$_POST['simpan'];
$stat=$_POST['stat'];
$sekarang=date("Y-m-d H:i:s");
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Form Pendaftaran
	$nomorpendaftaran=$_POST['nopen'];
	$nama=$_POST['nama'];
	$jurusan1=$_POST['jurusan1'];
	$jurusan2=$_POST['jurusan2'];
	$jk=$_POST['jk'];
	$tinggi=$_POST['tinggi'];
	$berat=$_POST['berat'];
	$tl=$_POST['tl'];
	$tgl_lahir=$_POST['tl3']."-".$_POST['tl2']."-".$_POST['tl1']; 
	$tl1=$_POST['tl1']; 
	$tl2=$_POST['tl2'];
	$tl3=$_POST['tl3'];
	$alamat=$_POST['alamat'];
	$telp=$_POST['telp'];
	$pos=$_POST['pos'];
	$asal_sekolah=$_POST['asal_sekolah'];
	$lokasi=$_POST['lokasi'];
	$negara=$_POST['negara'];
	$tahun=$_POST['tahun'];
	$ktp=$_POST['ktp'];
	$email=$_POST['email'];
//1. Buat Nomor Pendaftaran Dulu..
//2. Simpan Pendaftaran
		if ($simpan=="oke") {
		  if ($jurusan1==$jurusan2) { // if file not chosen
			  ?>
			  <script language="JavaScript">alert('Jurusan 1 dan Jurusan 2 yang Anda pilih tidak boleh sama.'); history.go(-1); </script>
			  <?php
			  exit();
		  }
				
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
		$query="UPDATE tb_pendaftaran 
			    SET nama_lengkap='$nama', tinggi_badan='$tinggi', berat_badan='$berat', tempat_lahir='$tl', 
				    tanggal_lahir='$tgl_lahir', jenis_kelamin='$jk', alamat='$alamat', telp='$telp', kode_pos='$pos',
					asal_sekolah_jurusan='$asal_sekolah', kewarganegaraan='$negara', jurusan_1='$jurusan1', 
					jurusan_2='$jurusan2', no_ktp='$ktp', email='$email'
				WHERE nomor_pendaftaran='$nomorpendaftaran'";
		querydb($query);
		closedb();
		?>
			<script language="JavaScript">alert('Data Diri Peserta sudah berhasil dirubah.');
			document.location='daftar_calon_terdaftar.php'</script>
		  <?php
		}
?>