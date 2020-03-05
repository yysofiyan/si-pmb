<div class="article">

    <?php
	$kode_setting=$_POST['koset'];
	$stat=$_POST['stat'];
	
	$satu=md5($_POST['satu']);
	$dua=md5($_POST['dua']);
	$tiga=md5($_POST['tiga']);
	?>
	
	
	<h2>Ubah Password</h2>
	<form method="post" action="index.php?page=ubah-pasword" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="ubah1">
	<input name="koset" type="hidden" value="<?php echo"$kode_setting"; ?>">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Password Lama </td>
					<td width="2%">:</td>
					<td width="75%"><input type="password" name="satu" value="<?php echo "$dview[1]"; ?>" maxlength="50" style="width:150px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">&nbsp;</td>
				    <td valign="top">&nbsp;</td>
				    <td>&nbsp;</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Password Baru </td>
					<td valign="top">:</td>
					<td><input type="password" name="dua" value="<?php echo "$dview[2]"; ?>" maxlength="50" style="width:150px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Ulangi Password Baru </td>
				    <td valign="top">:</td>
				    <td><input type="password" name="tiga" value="<?php echo "$dview[3]"; ?>" maxlength="50" style="width:150px;"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td></td>
					<td></td>
					<td align="right"></td>
				  </tr>
				</table>
	<div align="right" style=" background-color:#ffd318; border:1px solid; border-bottom-color:#999999; padding:3px; -moz-border-radius:5px 5px 5px 5px; -webkit-border-radius:5px 5px 5px 5px;">
	<input type="submit" name="submit" value="Simpan"></div>
	</form>
	<br>
	</div>
<?php
//Script untuk pemrosesan data :::
//ubah data
if ($stat=="ubah1") {
		if ($satu<>$dataadm[4])
		{ ?>
			<script language="JavaScript">alert('Passwrod lama salah. Password lama adalah password yang Anda gunakan sekarang.');
			document.location='index.php?page=ubah-pasword'</script>
		<?php }
		else
		{
			if (($dua<>$tiga) or ($dua=="") or ($tiga==""))
			{ ?>
				<script language="JavaScript">alert('Pasword baru dan password baru ulangi tidak sama dan tidak boleh dikosongkan.');
				document.location='index.php?page=ubah-pasword'</script>
			<?php }
			else
			{
				opendb();
				$query="UPDATE psb_panitia SET password_panitia='$dua' WHERE nip=$ses_admnya";
				querydb($query);
				closedb();
				?>
				<script language="JavaScript">alert('Perubahan berhasil disimpan.');
				document.location='index.php'</script>
				<?php
			}
		}
		}
?>