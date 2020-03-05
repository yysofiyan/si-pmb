<div class="article">
	<h2>Daftar Peserta PMB (Nilai Test)</h2>
	<iframe width="100%" height="600px" scrolling="auto" frameborder="1" src="daftar_calon_terdaftar_nilai.php" style="border:1px solid #00CC33;"></iframe>
	
		<div style=" padding:1px; margin-top:10px;">
				<table width="100%" border="0" cellspacing="1" cellpadding="5px">
				  <tr bgcolor="#C1C1C1">
					<td width="14%">Kode </td>
					<td width="62%">Nama Persyaratan </td>
					<td width="24%">Status </td>
				  </tr>
				<?php
				opendb();
				$qview1 = "SELECT * FROM syarat";
				$hview1 = querydb($qview1);
				closedb();
				while ($dview1 = mysql_fetch_array($hview1)) 
				{
				?>
				  <tr bgcolor="#FFFFFF">
					<td width="14%"><?php echo "$dview1[0]"; ?></td>
					<td width="62%"><?php echo "$dview1[1]"; ?></td>
					<td width="24%"><?php if ($dview1[2]=="Y") {echo "Wajib";} elseif ($dview1[2]=="N") {echo "Tidak Wajib";} ?></td>
				  </tr>
				<?php } ?>
	  </table>
	</div>

</div>