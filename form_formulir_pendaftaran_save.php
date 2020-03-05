<?php
date_default_timezone_set('Asia/Jakarta');

function UploadImage($fupload_name){
  //direktori gambar
  $vdir_upload = "./images_foto/thumb/";
  $vdir_upload2 = "./images_foto/";
  $vfile_upload = $vdir_upload2 . $fupload_name;
  $tipe_file   = @$_FILES['gambar']['type'];

  //Simpan gambar dalam ukuran sebenarnya
  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);
  
  if($tipe_file == "image/jpeg" || $tipe_file == "image/pjpeg" || $tipe_file == "image/jpg" ) {
	  //identitas file asli
	  $im_src = imagecreatefromjpeg($vfile_upload);
	  $src_width = imageSX($im_src);
	  $src_height = imageSY($im_src);
	
	  //Simpan dalam versi small 
	  //Set ukuran gambar hasil perubahan
	  $dst_width = 300;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	
	  //proses perubahan ukuran
	  $im = imagecreatetruecolor($dst_width,$dst_height);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	  //Simpan gambar
	  imagejpeg($im,$vdir_upload . $fupload_name);
  } else {
	  //identitas file asli
	  $im_src = imagecreatefrompng($vfile_upload);
	  
	  $src_width = imageSX($im_src);
	  $src_height = imageSY($im_src);
	  /*
	  //Simpan dalam versi small 
	  //Set ukuran gambar hasil perubahan
	  $dst_width = 40;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  
	  //proses perubahan ukuran
	  $im = imagecreatefrompng($dst_width,$dst_height);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	  */
		$dst_width = 300;
		$dst_height = ($dst_width/$src_width)*$src_height;
	
		$im = imagecreatetruecolor($dst_width, $dst_height);
	
		imagealphablending($im, false);
		imagesavealpha($im, true);
		$transparent = imagecolorallocatealpha($im, 255, 255, 255, 127);
		imagefilledrectangle($im, 0, 0, $src_width, $src_height, $transparent);
		imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

       //return $newImg;	
	
	  //Simpan gambar
	  imagepng($im,$vdir_upload . $fupload_name);
  }
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function UploadImage2($fupload_name){
  //direktori gambar
  $vdir_upload = "./images_ijazah/thumb/";
  $vdir_upload2 = "./images_ijazah/";
  $vfile_upload = $vdir_upload2 . $fupload_name;
  $tipe_file   = @$_FILES['gambar2']['type'];

  //Simpan gambar2 dalam ukuran sebenarnya
  move_uploaded_file($_FILES["gambar2"]["tmp_name"], $vfile_upload);
  
  if($tipe_file == "image/jpeg" || $tipe_file == "image/pjpeg" || $tipe_file == "image/jpg" ) {
	  //identitas file asli
	  $im_src = imagecreatefromjpeg($vfile_upload);
	  $src_width = imageSX($im_src);
	  $src_height = imageSY($im_src);
	
	  //Simpan dalam versi small 
	  //Set ukuran gambar2 hasil perubahan
	  $dst_width = 800;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	
	  //proses perubahan ukuran
	  $im = imagecreatetruecolor($dst_width,$dst_height);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
	
	  //Simpan gambar2
	  imagejpeg($im,$vdir_upload . $fupload_name);
	  
	  //Hapus gambar2 di memori komputer
	  imagedestroy($im_src);
	  imagedestroy($im);
  }
  
}

include "./config.php";
include "./koneksi.php";
$simpan=$_POST['simpan'];
$stat=$_POST['stat'];
$sekarang=date("Y-m-d H:i:s");
//Script Simpan Pendaftaran
//0. Ambil data yang didapat dari Form Pendaftaran
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
	$ktp=$_POST['ktp'];
	$email=$_POST['email'];
	
	$tahun=$_POST['tahun'];
	
	$fileName = $_FILES["gambar"]["name"]; // The file name
	$fileTmpLoc = $_FILES["gambar"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["gambar"]["type"]; // The type of file it is
	$fileSize = $_FILES["gambar"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["gambar"]["error"]; // 0 for false... and 1 for true
	
	$fileName2 = $_FILES["gambar2"]["name"]; // The file name
	$fileTmpLoc2 = $_FILES["gambar2"]["tmp_name"]; // File in the PHP tmp folder
	$fileType2 = $_FILES["gambar2"]["type"]; // The type of file it is
	$fileSize2 = $_FILES["gambar2"]["size"]; // File size in bytes
	$fileErrorMsg2 = $_FILES["gambar2"]["error"]; // 0 for false... and 1 for true
	//Data tahun yang aktif
	opendb();
	$qtahun = "SELECT * FROM setting WHERE status='Y'";
	$htahun = querydb($qtahun);
	closedb();
	$dtahun = mysql_fetch_array($htahun);


//1. Buat Nomor Pendaftaran Dulu..
//2. Simpan Pendaftaran
	if ($jurusan1==$jurusan2) { // if file not chosen
		?>
		<script language="JavaScript">alert('Jurusan 1 dan Jurusan 2 yang Anda pilih tidak boleh sama.'); history.go(-1); </script>
        <?php
		exit();
	}

	if ($fileSize>153600 || $fileSize2>307200) { // if file not chosen
		?>
		<script language="JavaScript">alert('ERROR: Foto tidak boleh lebih dari 100 KByte, dan Ijazah tidak lebih dari 200 KByte.'); history.go(-1); </script>
        <?php
		exit();
	}

	if (!$fileTmpLoc || !$fileTmpLoc2) { // if file not chosen
		?>
		<script language="JavaScript">alert('ERROR: Foto dan Ijazah tidak boleh dikosongkan.'); history.go(-1); </script>
        <?php
		exit();
	}
	
	elseif (($fileType != "image/jpeg" && $fileType != "image/pjpeg" && $fileType != "image/png" && $fileType != "image/PNG" && $fileType2 != "image/jpeg" && $fileType2 != "image/pjpeg") && $fileTmpLoc){
		//header('location:../../media.php?module='.$module);
		?>
		<script language="JavaScript">alert('Foto harus format JPG atau PNG. Ijazah harus format JPG/JPEG.'); history.go(-1); </script>
        <?php
		exit();
	}
	

	elseif ($simpan=="oke") {	
		if($lokasi="Samarinda") { $lok="S"; } else { $lok="B"; }
		$tglsekarang=date("Y")."-".date("m")."-".date("d")." ".date('H:i:s');
		//auto nomor pendaftaran
		//$thn=date("y");
		$thn=$lok.substr($dtahun['tahun'], 2, 2);
		opendb();
		$qnom = "SELECT count(*) FROM tb_pendaftaran WHERE nomor_pendaftaran LIKE '" . $thn . "%'";
		$hnom = querydb($qnom);
		closedb();
		$dnom = mysql_fetch_array($hnom);
		if ($dnom[0] == 0) {
			$nopen=$thn . "000001";
		}
		elseif ($dnom[0] > 0) {
			opendb();
			$qnom2 = "SELECT nomor_pendaftaran FROM tb_pendaftaran WHERE nomor_pendaftaran LIKE '" . $thn . "%' ORDER BY nomor_pendaftaran DESC LIMIT 0, 1";
			$hnom2 = querydb($qnom2);
			closedb();
			$dnom2 = mysql_fetch_array($hnom2);
			$digit4=substr($dnom2[0], 3, 6);
			$digit4=$digit4 + 1;
			if ($digit4 < 10) { $nopen=$thn . "00000" . $digit4; }
			elseif ($digit4 < 100) { $nopen=$thn . "0000" . $digit4; }
			elseif ($digit4 < 1000) { $nopen=$thn . "000" . $digit4; }
			elseif ($digit4 < 10000) { $nopen=$thn . "00" . $digit4; }
			elseif ($digit4 < 100000) { $nopen=$thn . "0" . $digit4; }
			elseif ($digit4 < 1000000) { $nopen=$thn . $digit4; }
		}
		//end autonumber pendaftaran
		
		$JustfileName = pathinfo(@$_FILES['gambar']['name'], PATHINFO_FILENAME);
		$JustfileExten = pathinfo(@$_FILES['gambar']['name'], PATHINFO_EXTENSION);
		$tgl_x=date("dmYHis", strtotime($sekarang));
		$nama_file_unik = $nopen."_".$tgl_x.".".$JustfileExten; 
		
		$JustfileName2 = pathinfo(@$_FILES['gambar2']['name'], PATHINFO_FILENAME);
		$JustfileExten2 = pathinfo(@$_FILES['gambar2']['name'], PATHINFO_EXTENSION);
		$tgl_x2=date("dmYHis", strtotime($sekarang));
		$nama_file_unik2 = $nopen."_".$tgl_x2.".".$JustfileExten2; 
		
		//Buat default password
		$key="pmb01";
		$pass=md5(substr($nopen, 1, 8) + $key);
		$pass=substr($pass, 0, 8);
		$pass_temp=$pass;
		$pass=md5($pass);
		
		opendb();
      	UploadImage($nama_file_unik);
      	UploadImage2($nama_file_unik2);
		$query="INSERT INTO tb_pendaftaran 
					(nomor_pendaftaran, nama_lengkap, tinggi_badan, berat_badan, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, telp, kode_pos,
					 asal_sekolah_jurusan, kewarganegaraan, jurusan_1, jurusan_2, tempat_test, password, password_temp,
					 waktu_daftar, kode_setting, foto, no_ktp, email, ijazah) 
				VALUES ('$nopen', '$nama', '$tinggi', '$berat', '$tl', '$tgl_lahir', '$jk', '$alamat', '$telp', '$pos', '$asal_sekolah',
					'$negara', '$jurusan1', '$jurusan2', '$lokasi', '$pass', '$pass_temp', '$sekarang', '$dtahun[0]', '$nama_file_unik', '$ktp', '$email', '$nama_file_unik2')";
		querydb($query);
		closedb();
		}
		header("location:index.php?page=pendaftaran-berhasil&nopen=$nopen");
?>