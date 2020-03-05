<?php
include "../config.php";
include "../koneksi.php";

$nopen=$_REQUEST['nopen'];
?>
<script type="text/javascript">
// Forms Validator
$j(function() {
    $j("#pendaftaran").validate();
});
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="../style2.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="content">
<div class="mainbar">
	<div align="center" style="font-size:16px; color:#006600; font-weight:bold; padding-top:10px; padding-bottom:10px; background-color:#FFFFFF;">Ubah Data Diri Peserta | No. Pendaftaran : <?php echo"$nopen"; ?></div>
	<form method="post" action="form_formulir_pendaftaran_ubah_update.php" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="ubah">
	<input name="simpan" type="hidden" value="oke">
	<input name="nopen" type="hidden" value="<?php echo"$nopen"; ?>">
	<?php 
    opendb();
    $qdatadiri="SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran='$nopen'";
    $hdatadiri=querydb($qdatadiri);
    closedb();
    $ddatadiri=mysql_fetch_array($hdatadiri);
    ?>

				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
				    <td>Jurusan/Program studi</td>
				    <td>:</td>
				    <td>
                    <select name="jurusan1">
				      <option value="0">- Pilihan 1 -</option>
                      <?php
					  	opendb();
						$q_jur1="SELECT * FROM jurusan ORDER BY kode_jurusan ASC";
						$h_jur1=querydb($q_jur1);
						closedb();
						while($d_jur1=mysql_fetch_array($h_jur1)) {
					  ?>
				      <option value="<?php echo $d_jur1['kode_jurusan']; ?>" <?php if($ddatadiri['jurusan_1']==$d_jur1['kode_jurusan']) { echo "selected"; } ?>><?php echo $d_jur1['jurusan']; ?></option>
			          <?php } ?>
                    </select>
				    <select name="jurusan2">
				      <option value="0">- Pilihan 2 -</option>
                      <?php
					  	opendb();
						$q_jur2="SELECT * FROM jurusan ORDER BY kode_jurusan ASC";
						$h_jur2=querydb($q_jur2);
						closedb();
						while($d_jur2=mysql_fetch_array($h_jur2)) {
					  ?>
				      <option value="<?php echo $d_jur2['kode_jurusan']; ?>" <?php if($ddatadiri['jurusan_2']==$d_jur2['kode_jurusan']) { echo "selected"; } ?>><?php echo $d_jur2['jurusan']; ?></option>
		              <?php } ?>
                    </select></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="26%">Nama Lengkap</td>
					<td width="1%">:</td>
					<td width="73%"><input type="text" name="nama" id="satu" class="required" value="<?php echo "$ddatadiri[nama_lengkap]"; ?>" maxlength="50" style="width:300px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jenis Kelamin </td>
				    <td>:</td>
				    <td align="right">
					<div align="left">
						<select name="jk" style="width:150px;">
							<option value="1" <?php if($ddatadiri['jenis_kelamin']==1) { echo "selected"; } ?>>Pria</option>
							<option value="2" <?php if($ddatadiri['jenis_kelamin']==2) { echo "selected"; } ?>>Wanita</option>
						</select>
				    </div>					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Tinggi Badan</td>
				    <td valign="top">:</td>
				    <td><input type="text" name="tinggi" class="required number" value="<?php echo "$ddatadiri[tinggi_badan]"; ?>" maxlength="3" style="width:50px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Berat Badan</td>
				    <td valign="top">:</td>
				    <td><input type="text" name="berat" class="required number" value="<?php echo "$ddatadiri[berat_badan]"; ?>" maxlength="3" style="width:50px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tempat, Tanggal Lahir </td>
					<td valign="top">:</td>
					<td><input type="text" name="tl" id="dua" class="required" value="<?php echo "$ddatadiri[tempat_lahir]"; ?>" maxlength="20" style="width:150px;"> ,&nbsp;&nbsp;
						<?php
                        $d1=substr($ddatadiri['tanggal_lahir'], 0, 4);
						$d2=substr($ddatadiri['tanggal_lahir'], 5, 2);
						$d3=substr($ddatadiri['tanggal_lahir'], 8, 2);
						?>
                        <select name="tl1" style="width:50px;">
							<option value="<?php echo"$d3"; ?>"><?php echo"$d3"; ?></option>
							<option value="01">01</option>
							<option value="02">02</option>
							<option value="03">03</option>
							<option value="04">04</option>
							<option value="05">05</option>
							<option value="06">06</option>
							<option value="07">07</option>
							<option value="08">08</option>
							<option value="09">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
						-
						<select name="tl2" style="width:100px;">
							<option value="01" <?php if($d2=="01") { echo"selected"; } ?>>Januari</option>
							<option value="02" <?php if($d2=="02") { echo"selected"; } ?>>Februari</option>
							<option value="03" <?php if($d2=="03") { echo"selected"; } ?>>Maret</option>
							<option value="04" <?php if($d2=="04") { echo"selected"; } ?>>Aril</option>
							<option value="05" <?php if($d2=="05") { echo"selected"; } ?>>Mei</option>
							<option value="06" <?php if($d2=="06") { echo"selected"; } ?>>Juni</option>
							<option value="07" <?php if($d2=="07") { echo"selected"; } ?>>Juli</option>
							<option value="08" <?php if($d2=="08") { echo"selected"; } ?>>Agustus</option>
							<option value="09" <?php if($d2=="09") { echo"selected"; } ?>>September</option>
							<option value="10" <?php if($d2=="10") { echo"selected"; } ?>>Oktober</option>
							<option value="11" <?php if($d2=="11") { echo"selected"; } ?>>November</option>
							<option value="12" <?php if($d2=="12") { echo"selected"; } ?>>Desember</option>
						</select>
						-
						<select name="tl3">
                        	<?php for($i=0; $i<40; $i++) { 
								$tgl=date("Y");
								$thn=$tgl-$i;
							?>
							<option value="<?php echo $thn; ?>" <?php if($thn==$d1) { echo "selected"; } ?>><?php echo $thn; ?></option>
                            <?php } ?>
						</select>
				  </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor KTP</td>
				    <td>:</td>
				    <td align="left"><input type="text" name="ktp" id="dua4" class="required" value="<?php echo "$ddatadiri[no_ktp]"; ?>" maxlength="15" style="width:200px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Email <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td align="left"><input type="text" name="email" id="dua4" class="required email" value="<?php echo "$ddatadiri[email]"; ?>" maxlength="50" style="width:250px;" /></td>
			      </tr>
                  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Alamat Lengkap <div style="font-size:10px; color:#333;">(Tempat Tinggal)</div></td>
                    <td>:</td>
                    <td align="right"><div align="left">
					  <textarea name="alamat"  class="required" cols="" rows="4" style="width:300px;"><?php echo "$ddatadiri[alamat]"; ?></textarea>
                    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor Telepon</td>
				    <td>:</td>
				    <td align="left"><input type="text" name="telp" id="dua4" class="required" value="<?php echo "$ddatadiri[telp]"; ?>" maxlength="15" style="width:200px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Kode POS</td>
				    <td>:</td>
				    <td align="left"><input type="text" name="pos" id="dua5" class="required" value="<?php echo "$ddatadiri[kode_pos]"; ?>" maxlength="5" style="width:100px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Asal Sekolah / Jurusan <div style="font-size:10px; color:#333;">(Nama Sekolah, lokasi/kabupaten)</div></td>
                    <td>:</td>
                    <td align="right"><div align="left">
					  <textarea name="asal_sekolah"  class="required" cols="" rows="4" style="width:300px;"><?php echo "$ddatadiri[asal_sekolah_jurusan]"; ?></textarea>
                    </div>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="25%">Kewarganegaraan</td>
					<td width="1%">:</td>
					<td width="74%">
                    <select name="negara">
                    	<option value="WNI" <?php if($ddatadiri['kewarganegaraan']=="WNI") { echo "selected"; } ?>>WNI</option>
                    	<option value="WNA" <?php if($ddatadiri['kewarganegaraan']=="WNA") { echo "selected"; } ?>>WNA</option>
                    </select>
                    </td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Lokasi Test </td>
				    <td>:</td>
				    <td align="left"><?php echo "$ddatadiri[tempat_test]"; ?>
                    <!--
					<div align="left">
						<select name="lokasi" style="width:150px;" >
							<option value="Samarinda" <?php if ($ddatadiri['tempat_test']=="Samarinda") { echo "selected"; } ?> >Samarinda</option>
							<option value="Balikpapan" <?php if ($ddatadiri['tempat_test']=="Balikpapan") { echo "selected"; } ?> >Balikpapan</option>
						</select>
				    </div>		
                    -->			
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="28%">Foto</td>
					<td width="1%">:</td>
					<td width="67%"><img src="../images_foto/thumb/<?php echo "$ddatadiri[foto]"; ?>" title="Foto Anda" width="150"/></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td align="right">&nbsp;</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td align="left"><input type="submit" name="button" id="button" value="Simpan Perubahan" /></td>
			      </tr>
				</table>				
	  <br />

	<br>
	</form>
</div>
</div>
</body>