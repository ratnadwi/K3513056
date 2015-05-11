<?php
  $this->load->view('header');
  $this->load->view('menu'); 
?>

<div class="data">
	<table class="table table-striped">
		<tr>
			<td>NIM</td>
			<td><?php echo $data->nim; ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?php echo $data->nama; ?></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><?php echo $data->alamat; ?></td>
		</tr>
			<tr>
			<td>Jenis Kelamin</td>
			<td><?php echo $data->jeniskelamin; ?></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<td><?php echo $data->tanggallahir; ?></td>
		</tr>
		
		<tr>
			<td>Tahun Akademik</td>
			<td><?php echo $data->tahunakademik; ?></td>
		</tr>
		
	</table>
	<?php echo $link_back; ?>
</div>

<?php $this->load->view('footer'); ?>