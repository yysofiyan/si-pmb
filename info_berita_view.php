<?php
opendb();
$qberita2="SELECT a.*, b.nama FROM informasi as a, panitia as b WHERE a.kode_panitia=b.kode_panitia AND a.kode_informasi='$id_berita'";
$hberita2=querydb($qberita2);
closedb();
$dberita2=mysql_fetch_array($hberita2);
?>
<div class="article">

	<h2>Informasi : <?php echo "$dberita2[1]"; ?></h2>
	<div style="color:#0066FF; font-size:10px; margin-bottom:10px; "><?php echo "$dberita2[tanggal]"; ?>, oleh <?php echo "$dberita2[nama]"; ?></div>
		<?php if ($dberita2[3]<>"") { ?>
		<div style="float:left; padding:3px; border:1px solid #CCCCCC; background:#F4F4F4; margin:0 10px 10px 0;">
        	<img src="adminPMB/images_info/<?php echo"$dberita2[gambar]"; ?>" style="max-width:350px;">
        </div>
		<?php
		}
		?>
	<div>
		<?php 
		echo "$dberita2[2]";
		?>
	</div>
</div>