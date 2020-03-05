<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
$pub_tgl=date("d-m-Y");

include "./config.php";
include "./koneksi.php";

$page=$_REQUEST['page'];
$ses_clnpsb=$_SESSION['sesclnpsb'];
/*
unset($_SESSION['waktu_sisa']);
unset($_SESSION['waktu_awal']);

unset($_SESSION['kat_now']);
unset($_SESSION['jumlah_satu']);
unset($_SESSION['jumlah_soal_perhalaman']);
unset($_SESSION['jumlah_sekarang']);
unset($_SESSION['jumlah_sekarang2']);
unset($_SESSION['number_sekarang']);

unset($_SESSION['soalsave']);
*/

if (isset($_SESSION['sesclnpsb']))
{ 
opendb();
$querycln="SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran='$ses_clnpsb'";
$hasilcln=querydb($querycln);
closedb();
$datacln=mysql_fetch_array($hasilcln);

//Data tahun yang aktif
opendb();
$qtahun = "SELECT * FROM setting WHERE status='Y'";
$htahun = querydb($qtahun);
closedb();
$dtahun = mysql_fetch_array($htahun);

//TIMER ON PHP
$timestamp = time();
$diff = 7200; //<-Time of countdown in seconds.  ie. 3600 = 1 hr. or 86400 = 1 day.

//MODIFICATION BELOW THIS LINE IS NOT REQUIRED.
if(!isset($_SESSION['waktu_sisa'])) {
	$_SESSION['waktu_awal']=time();
	$_SESSION['waktu_sisa'] = $diff;
}

if(isset($_SESSION['waktu_sisa'])) {
	$slice = (($_SESSION['waktu_awal'] + $diff)-$timestamp );	
	$_SESSION['waktu_sisa'] = $slice;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Test Online - PMB | STKIP 11 April Sumedang | Jl. Angkrek Situ No.19 Sumedang</title>
<link rel="shortcut ICON" href="images/icon.png" />
<link href="style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="./js/jquery.countdown.css">
<style type="text/css">
#defaultCountdown { width: 240px; height: 45px; }
</style>
<script type="text/javascript" src="./js/183/jquery.min.js"></script>
<script type="text/javascript" src="./js/jquery.countdown.js"></script>
<script type="text/javascript">
function waktuHabis(){
	<!--alert("selesai dikerjakan ......");-->
	<!--document.lembarTest.submit();-->
	document.location='index.php?page=test-selesai'; 
	}		
function hampirHabis(periods){
	if($.countdown.periodsToSeconds(periods) == 900){
		$(this).css({color:"red"});
		}
	}
	
$(function () {
	var austDay = new Date();
	<!--Waktu pengerjaan (Dalam detik)-->
	<?php if($_SESSION['waktu_sisa']=="") { ?>
		austDay = 7200;
	<?php } else { ?>
		austDay = <?php echo $_SESSION['waktu_sisa']; ?>;
	<?php } ?>
	
	$('#defaultCountdown').countdown({until: austDay,
		onExpiry:waktuHabis,
		onTick: hampirHabis
	});
	$('#year').text(austDay.getFullYear());
		onExpiry:waktuHabis;
		onTick: hampirHabis;
});
</script>
</head>

<body>
<div class="main">

  <div class="header">
    <div class="header_resize">
      <div class="logo">
        <h1>STKIP 11 April Sumedang</a><a href="index.php">&nbsp;|&nbsp;PMB<br /></a></h1>
        <div style="position:relative; color:#FFFFFF; font-size:16px; font-weight:500; left:102px; top:-20px; ">Jl. Angkrek Situ No.19 Sumedang</div> 					
      </div>
      <div id="menu">
        <ul>
          <li class="active"><a href="#"><b>ANDA BERADA DALAM HALAMAN TEST ONLINE</b> - MOHON JANGAN DI REFRESH.</a></li>
        </ul>
      </div>
      <div class="clr"></div>
    </div>
  </div>
 
  <div class="content">
    <div class="content_resize">
      <div class="sidebar">
        <div class="gadget">
          <h3 class="star">WAKTU PENGERJAAN</h3>
          <div id="defaultCountdown"></div>
          <h3 class="star">INFORMASI</h3>
          <div id="year"></div>
        </div>
        <?php include "login2.php"; ?>
      </div>
      
      <div class="mainbar">
      
      <?php
	  	if($_SESSION['kat_now']=="") { $_SESSION['kat_now']=0; } else { $_SESSION['kat_now']=$_SESSION['kat_now']; }
	  
	  	opendb();
		$qjmax="SELECT SUM(jumlah) FROM setting_soal_kategori WHERE kode_setting='$dtahun[0]'";
		$hjmax=querydb($qjmax);
		closedb();
		$djmax=mysql_fetch_array($hjmax);
		$_SESSION['jml_max']=$djmax[0];
		
	  	opendb();
		$qj_perkat="SELECT a.kode_soal_kategori, a.jumlah, b.nama_kategori FROM setting_soal_kategori as a, soal_kategori as b
					WHERE a.kode_setting='$dtahun[0]' AND a.kode_soal_kategori=b.kode_soal_kategori 
					AND a.jumlah>0 LIMIT $_SESSION[kat_now], 1";
		$hj_perkat=querydb($qj_perkat);
		closedb();
		$dj_perkat=mysql_fetch_array($hj_perkat);
		$jml_satu=$dj_perkat['jumlah'];
		if($_SESSION['jumlah_satu']==0 or $_SESSION['jumlah_satu']=="") 
			{ $_SESSION['jumlah_satu']=$jml_satu; } else { $_SESSION['jumlah_satu']=$_SESSION['jumlah_satu']; }
			
		//Setting Set soal per halaman
		if($_SESSION['jumlah_satu']>=5) { $_SESSION['jumlah_soal_perhalaman']=5; }
		elseif($_SESSION['jumlah_satu']<5) { $_SESSION['jumlah_soal_perhalaman']=$_SESSION['jumlah_satu']; }
			
			
		if($_SESSION['jumlah_sekarang']=="") { $_SESSION['jumlah_sekarang']=$_SESSION['jumlah_soal_perhalaman']; }
		elseif($_SESSION['jumlah_sekarang']<>"") { $_SESSION['jumlah_sekarang']=$_SESSION['jumlah_sekarang2']+$_SESSION['jumlah_soal_perhalaman']; }
		
		if($_SESSION['number_sekarang']=="") { $_SESSION['number_sekarang']=0; }
	  ?>
      
      <table width="100%" border="0" cellspacing="0" cellpadding="5px">
      	 <tr>
         	<td><?php echo "<b>Soal : $dj_perkat[nama_kategori]</b>"; ?></td>
            <td align="right"><?php echo "Soal ke <b>$_SESSION[jumlah_sekarang]</b> dari <b>$_SESSION[jml_max]</b>"; ?></td>
         </tr>
      </table>
      
      <form action="test-online-save.php" method="post" enctype="multipart/form-data" name="lembarTest" id="lembarTest">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
                
				<?php
				if(!isset($_SESSION['soalsave'])) {
				opendb();
				$qview1 = "SELECT a.kode_soal_bank, a.soal, b.nama_kategori, b.keterangan, a.tanggal_input
						   FROM soal_bank as a, soal_kategori as b
						   WHERE a.kode_soal_kategori=b.kode_soal_kategori and a.kode_soal_kategori='$dj_perkat[0]' 
						   and (a.kode_soal_bank NOT IN (SELECT a.kode_soal_bank FROM test_online_hasil as a, test_online as b 
						   								 WHERE a.kode_test=b.kode_test AND b.nomor_pendaftaran='$ses_clnpsb')) 
						   ORDER BY rand() LIMIT 0, $_SESSION[jumlah_soal_perhalaman]";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1))
				{
					$_SESSION['soalsave'][]=$dview1[0];
				}
				}
				
				$jml_soal=count($_SESSION['soalsave']);
				$no=$_SESSION['number_sekarang'];
				for($i=0; $i<$jml_soal; $i++) {
					
					$kode=$_SESSION['soalsave'][$i];
					opendb();
					$qview1 = "SELECT a.kode_soal_bank, a.soal
							   FROM soal_bank as a WHERE a.kode_soal_bank='$kode'";
					$hview1 = querydb($qview1);
					closedb();
					$dview1 = mysql_fetch_array($hview1);
					$no=$no+1;
				?>
                <input type="hidden" name="id_soal[]" value="<?php echo "$dview1[0]"; ?>" />
				  <tr bgcolor="#FFFFFF">
					<td width="6%"><?php echo "$no"; ?></td>
					<td width="94%"><?php echo "$dview1[1]"; ?></td>
				  </tr>
					  <?php
					  $nom=0;
					  opendb();
					  $qjawab = "SELECT kode_soal_bank_jawaban, jawaban, kode_soal_bank, status 
					             FROM soal_bank_jawaban WHERE kode_soal_bank='$dview1[kode_soal_bank]' ORDER BY rand()";
					  $hjawab = querydb($qjawab);
					  closedb();
					  while ($djawab = mysql_fetch_array($hjawab)) {
					  $nom=$nom+1;
					  if($nom==1) { $abc="A"; } elseif ($nom==2) { $abc="B"; } elseif ($nom==3) { $abc="C"; } elseif ($nom==4) { $abc="D"; } elseif ($nom==5) { $abc="E"; }
					  ?>
				  <tr bgcolor="#FFFFFF">
				    <td>&nbsp;</td>
                    
				    <td><input type="radio" name="jawab<?php echo "$dview1[0]"; ?>" value="<?php echo $djawab[0]; ?>"  /> <?php echo "$abc .  $djawab[1]"; ?></td>
			      </tr>
                  <?php } ?>
				<?php } ?>
                <tr>
					<td width="6%">&nbsp;</td>
					<td width="94%">&nbsp;</td>
                </tr>
                <tr>
					<td width="6%"></td>
					<td width="94%"><input type="submit" value="Lanjutkan" name="btnLanjut"/></td>
                </tr>
	  </table>
      </form>
      </div>

      <div class="clr"></div>
    </div>
  </div>

  <div class="footer">
    <div class="footer_resize">
      <p class="lf">&copy; Copyright STKIP 11 April Sumedang - Developed By <a>Yanyan Sofiyan,M.Kom.</a> - </p>
      <ul class="fmenu">
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php?page=sambutan-kepala-sekolah">Sambutan</a></li>
          <li><a href="index.php?page=petunjuk-pengisian">Petunjuk Pengisian</a></li>
          <li><a href="index.php?page=kontak">Kontak</a></li>
      </ul>
    </div>
    <div class="clr"></div>
  </div>
</div>

</body>
</html>
<?php } else { ?>
<script language="JavaScript">document.location='index.php'</script>
<?php
} 
?>