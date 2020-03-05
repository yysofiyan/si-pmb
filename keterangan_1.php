<h3>Terimakasih, Test Latihan sudah selesai</h3>
<div style="margin-top:20px;">
Test selesai, terimakasih atas waktu Anda untuk mengerjakan soal-soal dengan baik. Kembali ke <a href="index.php" title="Halaman awal">halaman utama</a>.
</div>
<?php
//Hitung Semua Soal
opendb();
$qjmax="SELECT SUM(jumlah) FROM setting_soal_kategori WHERE kode_setting='$dtahun[0]'";
$hjmax=querydb($qjmax);
$djmax=mysql_fetch_array($hjmax);
$jumlah_total_soal=$djmax[0];

$qview1 = "SELECT a.nomor_pendaftaran, b.kode_test, b.mulai, b.selesai
		  FROM tb_pendaftaran as a, test_online as b
		  WHERE a.kode_setting='$dtahun[0]' AND a.nomor_pendaftaran='$datacln[nomor_pendaftaran]'
			  AND a.nomor_pendaftaran=b.nomor_pendaftaran";
$hview1 = querydb($qview1);
$dview1 = mysql_fetch_array($hview1);

$qx2="SELECT COUNT(DISTINCT(a.kode_soal_bank)) FROM test_online_hasil as a, soal_bank as b, soal_bank_jawaban as c WHERE c.kode_soal_bank=b.kode_soal_bank and a.kode_soal_bank=b.kode_soal_bank and a.kode_soal_bank_jawaban=c.kode_soal_bank_jawaban and c.status=1 and a.kode_test='$dview1[kode_test]'";
$hx2=querydb($qx2);
closedb();
$dx2=mysql_fetch_array($hx2);
$nilai= ($dx2[0]/$jumlah_total_soal)*100;
$nilai=round($nilai, 2);
?>
<div style="font-size:24px; color:#F60; margin-top:20px;">Nilai Anda : <?php echo $nilai; ?></div>
<div style="background-color:#CCC; color:#666; font-size:14px; padding:5px 10px; margin-top:20px; border-top:2px solid #36C;"><marquee direction="left">TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI TERIMAKASIH TEST SUDAH SELESAI </marquee></div>
<?php
unset($_SESSION['waktu_sisa']);
unset($_SESSION['waktu_awal']);

unset($_SESSION['kat_now']);
unset($_SESSION['jumlah_satu']);
unset($_SESSION['jumlah_soal_perhalaman']);
unset($_SESSION['jumlah_sekarang']);
unset($_SESSION['jumlah_sekarang2']);
unset($_SESSION['number_sekarang']);

unset($_SESSION['soalsave']);
?>