<?php
include "config.php";
include "koneksi.php";

$nopen=$_REQUEST['nopen'];
				
opendb();
$qdatadiri="SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran='$nopen'";
$hdatadiri=querydb($qdatadiri);
closedb();
$dview=mysql_fetch_array($hdatadiri);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Design by http://www.bluewebtemplates.com
Released for free under a Creative Commons Attribution 3.0 License
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Halaman Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body style="font-family:Arial, Helvetica, sans-serif; font-size:11px;">

<div class="content">
	<h2>Data Diri Pendaftaran</h2>
<style>
	.test table { border:1px solid #000000; }
	.test table tr td { border:1px dotted #333333; }
	.test table tr th { border:1px dotted #333333; }
</style>
<div class="test">
	<form method="post" action="form_formulir_pendaftaran_save.php" id="pendaftaran">
	<input name="stat" type="hidden" value="ubah">
	<input name="simpan" type="hidden" value="oke">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">No. Pendaftaran</td>
					<td width="2%">:</td>
					<td width="75%"><?php echo "$dview[nomor_pendaftaran]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Nama Lengkap</td>
					<td width="2%">:</td>
					<td width="75%"><?php echo "$dview[nama_lengkap]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">NIP/NRP/No Pokok Peg.</td>
				    <td valign="top">:</td>
				    <td><?php echo "$dview[nip]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Status</td>
				    <td valign="top">:</td>
				    <td>
                      <?php if($dview[status]==1) { echo "Kawin"; } ?>
                      <?php if($dview[status]==2) { echo "Belum Kawin"; } ?>
                      <?php if($dview[status]==3) { echo "Janda/Duda"; } ?>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tempat Lahir </td>
					<td valign="top">:</td>
					<td><?php echo "$dview[tempat_lahir]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td>Tanggal Lahir </td>
					<td>:</td>
					<td><?php echo "$dview[tanggal_lahir]"; ?></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jenis Kelamin </td>
				    <td>:</td>
				    <td align="right">
					<div align="left">
							<?php if($dview[jenis_kelamin]==1) { echo "Pria"; } ?>
							<?php if($dview[jenis_kelamin]==2) { echo "Wanita"; } ?>
				    </div>					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Alamat Rumah</td>
                    <td>:</td>
                    <td align="right"><div align="left">
					  <?php echo "$dview[alamat]"; ?>
                    </div></td>
			      </tr>
				  
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor Telepon</td>
				    <td>:</td>
				    <td align="left"><?php echo "$dview[telp]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Email</td>
				    <td>:</td>
				    <td align="left"><?php echo "$dview[email]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Kode POS</td>
				    <td>:</td>
				    <td align="left"><?php echo "$dview[kode_pos]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Pendidikan Terakhir</td>
				    <td>:</td>
				    <td align="left"><?php echo "$dview[pendidikan_terakhir]"; ?></td>
			      </tr>
				  <tr bgcolor="#CCCCCC">
				    <th colspan="3">UNIT KERJA</th>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Nama Unit Kerja </div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <?php echo "$dview[unit_kerja]"; ?>
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Alamat Unit Kerja</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <?php echo "$dview[alamat_unit_kerja]"; ?></textarea>
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Nomor Telepon</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <?php echo "$dview[telp_unit_kerja]"; ?>
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Kode POS</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <?php echo "$dview[kode_pos_unit_kerja]"; ?>
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td align="right">Jabatan</td>
				    <td>:</td>
				    <td align="left"><?php echo "$dview[jabatan]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td align="right">Pangkat/Golongan</td>
				    <td>:</td>
				    <td align="left"><?php echo "$dview[pangkat_golongan]"; ?></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td align="right">&nbsp;</td>
			      </tr>
				</table>				
	  <br />
	</form>
	
</div>
</body>