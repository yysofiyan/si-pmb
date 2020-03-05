<div class="article">

	<h2>Ubah Data Diri | Formulir Pendaftaran</h2>
	<form method="post" action="form_formulir_pendaftaran_isi_ubah_update.php" enctype="multipart/form-data" name="test">
	<input name="stat" type="hidden" value="ubah">
	<input name="simpan" type="hidden" value="oke">
	<input name="nopen" type="hidden" value="<?php echo"$ses_clnpsb"; ?>">
	<div style=" border:2px solid; border-color:#CCCCCC; padding:10px;">
				<?php 
				opendb();
				$qdatadiri="SELECT * FROM psb_pendaftaran WHERE nomor_pendaftaran='$ses_clnpsb'";
				$hdatadiri=querydb($qdatadiri);
				closedb();
				$ddatadiri=mysql_fetch_array($hdatadiri);
				?>
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFFFFF">
					<td width="23%">Nama Calon Siswa </td>
					<td width="2%">:</td>
					<td width="75%"><input type="text" name="satu" value="<?php echo"$ddatadiri[1]"; ?>" maxlength="50" style="width:300px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td valign="top">Tempat Lahir </td>
					<td valign="top">:</td>
					<td><input type="text" name="dua" value="<?php echo"$ddatadiri[2]"; ?>" maxlength="20" style="width:200px;"></td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
					<td>Tanggal Lahir </td>
					<td>:</td>
					<td><?php 
						$d1=substr($ddatadiri[3], 0, 4);
						$d2=substr($ddatadiri[3], 5, 2);
						$d3=substr($ddatadiri[3], 8, 2);
						?>
						<select name="tiga1" style="width:50px;">
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
						<select name="tiga2" style="width:100px;">
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
						<input type="text" name="tiga3" value="<?php echo "$d1"; ?>" maxlength="4" style="width:50px;">
					</td>
				  </tr>
				  <tr bgcolor="#FFFFFF">
				    <td>Jenis Kelamin </td>
				    <td>:</td>
				    <td align="right">
					<div align="left">
						<select name="lima" style="width:150px;">
							<option value="L" <?php if ($ddatadiri[5]=="L") { echo"selected"; } ?>>Laki-Laki</option>
							<option value="P" <?php if ($ddatadiri[5]=="P") { echo"selected"; } ?>>Perempuan</option>
						</select>
				    </div>
					</td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
                    <td>Agama</td>
                    <td>:</td>
                    <td align="right">
					<div align="left">
						<select name="enam" style="width:150px;">
							<option value="Islam" <?php if ($ddatadiri[6]="Islam") { echo"selected"; } ?>>Islam</option>
							<option value="Katholik" <?php if ($ddatadiri[6]="Katholik") { echo"selected"; } ?>>Katholik</option>
							<option value="Kristen" <?php if ($ddatadiri[6]="Kristen") { echo"selected"; } ?>>Kristen</option>
							<option value="Budha" <?php if ($ddatadiri[6]="Budha") { echo"selected"; } ?>>Budha</option>
							<option value="Hindu" <?php if ($ddatadiri[6]="Hindu") { echo"selected"; } ?>>Hindu</option>
							<option value="Kong Hu Chu" <?php if ($ddatadiri[6]="Kong Hu Chu") { echo"selected"; } ?>>Kong Hu Chu</option>
							<option value="Lainnya" <?php if ($ddatadiri[6]="Lainnya") { echo"selected"; } ?>>Lainnya</option>
						</select>
				    </div>
                    </td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
                    <td>Alamat Lengkap</td>
                    <td>:</td>
                    <td align="right"><div align="left">
					  <textarea name="tujuh" cols="" rows="4" style="width:300px; "><?php echo"$ddatadiri[7]"; ?></textarea>
                    </div></td>
			      </tr>
				  <tr bgcolor="#CCCCCC">
				    <td>Asal Sekolah </td>
				    <td>&nbsp;</td>
				    <td align="right"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Nama Sekolah </div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="delapan" value="<?php echo"$ddatadiri[8]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Kecamatan</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="sembilan" value="<?php echo"$ddatadiri[9]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Kabupaten</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="sepuluh" value="<?php echo"$ddatadiri[10]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Propinsi</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="sebelas" value="<?php echo"$ddatadiri[11]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#CCCCCC">
				    <td>Orang Tua </td>
				    <td>&nbsp;</td>
				    <td align="right"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Nama</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="duabelas" value="<?php echo"$ddatadiri[12]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Pekerjaan</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="tigabelas" value="<?php echo"$ddatadiri[13]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td><div align="right">Alamat</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <textarea name="empatbelas" cols="" rows="4" style="width:300px; "><?php echo"$ddatadiri[14]"; ?></textarea>
				    </div></td>
			      </tr>
				  <tr bgcolor="#CCCCCC">
				    <td>Wali Siswa</td>
				    <td>&nbsp;</td>
				    <td align="right"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Nama</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="limabelas" value="<?php echo"$ddatadiri[15]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Pekerjaan</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="enambelas" value="<?php echo"$ddatadiri[16]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				  <tr bgcolor="#FFFFFF" valign="top">
				    <td><div align="right">Alamat</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <textarea name="tujuhbelas" cols="" rows="4" style="width:300px; "><?php echo"$ddatadiri[17]"; ?></textarea>
				    </div></td>
			      </tr>
				  <tr bgcolor="#CCCCCC">
				    <td>Telah Mendaftar Di </td>
				    <td>&nbsp;</td>
				    <td align="right"></td>
			      </tr>
				  <tr bgcolor="#FFFFFF">
				    <td><div align="right">Nama Sekolah</div></td>
				    <td>:</td>
				    <td align="right"><div align="left">
				      <input type="text" name="delapanbelas" value="<?php echo"$ddatadiri[18]"; ?>" maxlength="50" style="width:300px;">
				    </div></td>
			      </tr>
				</table>				
	</div>
	
	<div style=" border:2px solid; border-color:#CCCCCC; padding:10px;">
				<table width="100%" border="0" cellspacing="0" cellpadding="5px">
				  <tr bgcolor="#FFCC00">
					<td width="23%">Nilai UAN</td>
					<td width="2%">:</td>
					<td width="75%">&nbsp;</td>
				  </tr>
				  <tr bgcolor="#CCCCCC">
					<td valign="top"><strong>Nama Mata Pelajaran </strong></td>
					<td valign="top"><strong>:</strong></td>
					<td><strong>Nilai - Koma (,) menggunakan titik (.) </strong></td>
				  </tr>
				  <?php
				  opendb();
				  $qview2 = "SELECT a.*, b.nilai FROM psb_mapel as a, psb_nilai_mapel as b WHERE a.kode_mapel=b.kode_mapel and b.nomor_pendaftaran='$ses_clnpsb'";
				  $hview2 = querydb($qview2);
				  closedb();
				  while ($dview2 = mysql_fetch_array($hview2)) {
				  ?>
				  <input type="hidden" value="<?php echo "$dview2[0]"; ?>" name="kode_mapel[]">
				  <tr bgcolor="#FFFFFF">
					<td valign="top"><div align="right"><?php echo "$dview2[1]"; ?></div></td>
					<td valign="top">:</td>
					<td><input type="text" name="nilai[]" value="<?php echo"$dview2[2]"; ?>" maxlength="5" style="width:100px;"></td>
				  </tr>
				  <?php } ?>
	  </table>
	</div>
	<div align="right" style=" background-color:#CCCCCC; border:1px solid; border-bottom-color:#999999; padding:3px;"><input type="submit" name="submit" value="Simpan Perubahan"></div>
	<br>
	<div style="color:#FF0000; font-weight:600; ">
	Mohon dibaca: <br>
	</div>
	<div style="color:#FF6600; ">
	- Mohon diisi data sebenar-benarnya. <br>
	- Sebelum Menyimpan (Meng-Klik tombol "Daftarkan Sekarang") mohon diteliti kembali. <br>
	- Data ini akan digunakan untuk seleksi tahap pertama. <br>
	</div>
	</form>
</div>