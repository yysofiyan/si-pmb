<script type="text/javascript">
function PrintElem(elem)
    {
        Popup(jQuery(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Nomor Pendaftaran dan Password Anda', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Nomor Pendaftaran dan Password Anda</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
	
function printElem2(elem)
    {
        Popup2(jQuery(elem).attr('src'));
    }

    function Popup2(data) 
    {
        var mywindow = window.open('', 'Nomor Pendaftaran dan Password Anda', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        mywindow.document.write('</head><body >');
        mywindow.document.write('<img src="'+data+'" />');
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>
<div class="article">
    <?php
	$nopen=$_GET['nopen'];
	opendb();
	$qview = "SELECT * FROM informasi_statis_web WHERE kode_statis=8";
	$hview = querydb($qview);
	closedb();
	$dview = mysql_fetch_array($hview);
	
	opendb();
	$qview1 = "SELECT * FROM tb_pendaftaran WHERE nomor_pendaftaran='$nopen'";
	$hview1 = querydb($qview1);
	closedb();
	$dview1 = mysql_fetch_array($hview1);

	if($dview1[password_temp]=="") { $pass=$pass; } else { $pass=$dview1[password_temp]; }
	?>
	<h2><?php echo "$dview[1]"; ?></h2>
	<div id="printme">
	<br />
    <div style="font-size:16px; color:#0099CC; border-bottom:1px dotted #0099CC; font-weight:bold; margin:5px 0; padding:5px 0;">Nomor Pendaftaran : <?php echo "$dview1[nomor_pendaftaran]"; ?></div> 
    <div style="font-size:16px; color:#FF6600; border-bottom:1px dotted #FF9900;  font-weight:bold; margin:5px 0; padding:5px 0;">Password &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?php echo "$pass"; ?></div>
    <div style="font-size:14px; color:#FF0000; border-bottom:1px dotted #FF0000;  font-weight:bold; margin:5px 0; padding:5px 0;">No. Pendaftaran dan Password digunakan untuk keperluan selanjutnya, MOHON DICATAT!</div>
    <br />
	<?php echo "$dview[2]"; ?>
	</div>
</div>
<input type="button" class="tombol" value="PRINT" onclick="PrintElem('#printme');" />
<?php
		opendb();
		$query="UPDATE tb_pendaftaran SET password_temp='' WHERE nomor_pendaftaran='$dview1[nomor_pendaftaran]'";
		querydb($query);
		closedb();
?>
