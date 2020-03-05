<script language="javascript">
function getkey(e)
{
if (window.event)
   return window.event.keyCode;
else if (e)
   return e.which;
else
   return null;
}
function goodchars(e, goods, field)
{
var key, keychar;
key = getkey(e);
if (key == null) return true;
 
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
goods = goods.toLowerCase();
 
// check goodkeys
if (goods.indexOf(keychar) != -1)
    return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
   return true;
    
if (key == 13) {
    var i;
    for (i = 0; i < field.form.elements.length; i++)
        if (field == field.form.elements[i])
            break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
    };
// else return false
return false;
}
</script>
<script type="text/javascript">
// Forms Validator
$j(function() {
    $j("#pendaftaran").validate();
});
</script>
			
<div class="article">

	<h2>Formulir Pendaftaran</h2>
	<form method="post" action="form_formulir_pendaftaran_save.php" id="pendaftaran" enctype="multipart/form-data">
    <input type="hidden" name="tahun" value="<?php echo $dtahun[0]; ?>" />
	<input name="stat" type="hidden" value="ubah">
	<input name="simpan" type="hidden" value="oke">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
				    <td>Jurusan/Program Studi <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
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
				      <option value="<?php echo $d_jur1['kode_jurusan']; ?>"><?php echo $d_jur1['jurusan']; ?></option>
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
				      <option value="<?php echo $d_jur2['kode_jurusan']; ?>"><?php echo $d_jur2['jurusan']; ?></option>
		              <?php } ?>
                    </select></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="25%">Nama Lengkap <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
					<td width="1%">:</td>
					<td width="74%"><input type="text" name="nama" id="satu" class="required" value="<?php echo "$dview[1]"; ?>" maxlength="50" style="width:300px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jenis Kelamin </td>
				    <td>:</td>
				    <td align="right">
					<div align="left">
						<select name="jk" style="width:150px;">
							<option value="1">Pria</option>
							<option value="2">Wanita</option>
						</select>
				    </div>					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Tinggi Badan <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td valign="top">:</td>
				    <td><input type="text" name="tinggi" class="required number" value="<?php echo "$dview[1]"; ?>" maxlength="3" style="width:50px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td valign="top">Berat Badan <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td valign="top">:</td>
				    <td><input type="text" name="berat" class="required number" value="<?php echo "$dview[1]"; ?>" maxlength="3" style="width:50px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tempat, Tanggal Lahir  <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
					<td valign="top">:</td>
					<td><input type="text" name="tl" id="dua" class="required" value="<?php echo "$dview[1]"; ?>" maxlength="40" style="width:170px;"> ,&nbsp;&nbsp;
						<select name="tl1" style="width:50px;">
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
							<option value="01">Januari</option>
							<option value="02">Februari</option>
							<option value="03">Maret</option>
							<option value="04">Aril</option>
							<option value="05">Mei</option>
							<option value="06">Juni</option>
							<option value="07">Juli</option>
							<option value="08">Agustus</option>
							<option value="09">September</option>
							<option value="10">Oktober</option>
							<option value="11">November</option>
							<option value="12">Desember</option>
						</select>
						-
						<select name="tl3">
                        	<?php for($i=0; $i<40; $i++) { 
								$tgl=date("Y");
								$thn=$tgl-$i;
							?>
							<option value="<?php echo $thn; ?>"><?php echo $thn; ?></option>
                            <?php } ?>
						</select>
				  </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor KTP <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td align="left"><input type="text" name="ktp" id="dua4" onKeyPress="return goodchars(event,'1234567890',this)" class="required" value="<?php echo "$dview[1]"; ?>" maxlength="20" style="width:200px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Email <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td align="left"><input type="text" name="email" id="dua4" class="required email" value="<?php echo "$dview[1]"; ?>" maxlength="50" style="width:250px;" /></td>
			      </tr>
                  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Alamat Lengkap  <span style="color:#F00; font-weight:bold; font-size:14px;">*</span><div style="font-size:10px; color:#333;">(Tempat Tinggal)</div></td>
                    <td>:</td>
                    <td align="right"><div align="left">
					  <textarea name="alamat"  class="required" cols="" rows="4" style="width:300px;"></textarea>
                    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Nomor Telepon <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td align="left"><input type="text" name="telp" id="dua4" onKeyPress="return goodchars(event,'1234567890+',this)" class="required" value="<?php echo "$dview[1]"; ?>" maxlength="15" style="width:200px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td>Kode POS <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td align="left"><input type="text" name="pos" id="dua5" onKeyPress="return goodchars(event,'1234567890',this)" class="required" value="<?php echo "$dview[1]"; ?>" maxlength="5" style="width:100px;" /></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Asal Sekolah / Jurusan  <span style="color:#F00; font-weight:bold; font-size:14px;">*</span><div style="font-size:10px; color:#333;">(Nama Sekolah, lokasi/kabupaten)</div></td>
                    <td>:</td>
                    <td align="right"><div align="left">
					  <textarea name="asal_sekolah"  class="required" cols="" rows="4" style="width:300px;"></textarea>
                    </div>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
					<td width="25%">Kewarganegaraan</td>
					<td width="1%">:</td>
					<td width="74%">
                    <select name="negara">
                    	<option value="WNI">WNI</option>
                    	<option value="WNA">WNA</option>
                    </select>
                    </td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Lokasi Test </td>
				    <td>:</td>
				    <td align="right">
					<div align="left">
						<select name="lokasi" style="width:150px;">
							<option value="Kampus STKIP">Kampus STKIP</option>
						</select>
				    </div>					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Foto Terbaru (JPEG, JPG, PNG) <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td><input name="gambar" type="file"/></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>File Ijazah (JPEG, JPG) <span style="color:#F00; font-weight:bold; font-size:14px;">*</span></td>
				    <td>:</td>
				    <td><input name="gambar2" type="file"/></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>&nbsp;</td>
				    <td>&nbsp;</td>
				    <td align="left"><input type="submit" name="button" id="button" value="Submit Pendaftaran" /></td>
			      </tr>
				</table>				
	  <br />

	<br>
	<div style="color:#FF0000; font-weight:600; ">
	Mohon dibaca: <br>
	</div>
	<div style="color:#FF6600; ">
	- Mohon diisi data sebenar-benarnya. <br>
	- Sebelum Menyimpan (Meng-Klik tombol "Submit Pendaftaran") mohon diteliti kembali. <br>
	</div>
	</form>
	
</div>