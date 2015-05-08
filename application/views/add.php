<?php
  $this->load->view('header');
 
?>

<div class="content">
	<?php echo $message; ?>
	<?php echo validation_errors(); ?>
	<center><h3>Form Edit Data</h3></center></br>
	<?php echo form_open('index.php/data/update1'); ?>
	<div class="data">
		<table class="table table-striped">
			<tr>
				<td>NIM</td>
				<td><input type="text" name="nim"  class="text" value="<?php echo (isset($data['nim']))?$data['nim']:''; ?>">
				<input type="hidden" name="nimbaru" value="<?php echo (isset($data['nim']))?$data['nim']:''; ?>">
				</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td><input type="text" name="nama" value="<?php echo (isset($data['nim']))?$data['nama']:''; ?>"></td>
				
			</tr>
			<tr>
				<td>Alamat</td>
				<td><textarea name='alamat'><?php echo $data['alamat'];?></textarea></textarea></td>
				
			</tr>
			<tr><td>Jenis Kelamin</td><td>
			<?php if ($data['jeniskelamin'] == "L") echo "<input type='radio' name='jenis_kelamin' value='L' checked> Laki-Laki";
					else echo "<input type='radio' name='jenis_kelamin' value='L'> Laki-laki";
						echo"</td></tr>";
						if ($data['jeniskelamin'] == "P") echo "<tr><td></td><td><input type='radio' name='jenis_kelamin' value='P' checked> Perempuan";
						else echo "<input type='radio' name='jenis_kelamin' value='P'> Perempuan";
		
					echo "</td></tr>";
								?>
			
			
			<tr>
				<td>Tanggal Lahir (yyyy-mm-dd)</td><td><input type="text" name="tanggal_lahir" value="<?php echo (isset($data['nim']))?$data['tanggallahir']:''; ?>"></td>
			</tr>
			
			<tr>
				<td>Tahun Masuk UNS</td><td><select name="thnpt">
			<?php
				for ($i=1990; $i<=2017;$i++)
				{
					if ($i==$data['tahunakademik']) echo "<option selected>".$data['tahunakademik']."</option>";
					else echo "<option>".$i."</option>";
				}
				echo "</select></td></tr>";
			?></td>
			</tr>
			<tr>	<td> &nbsp;</td>
				<td><input type="submit" value="Simpan" class="btn btn-info"></td>
			</tr>
		</table>
	</div>
	<?php echo form_close(); ?>
</div>
<?php $this->load->view('footer'); ?>