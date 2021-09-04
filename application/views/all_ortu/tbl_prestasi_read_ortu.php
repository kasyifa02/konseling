<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?php echo $title ?> Detail</h1>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<tr>
				<td>Username</td>
				<td><?php echo $username; ?></td>
			</tr>
			<tr>
				<td>Full Name</td>
				<td>
					<?php
					$row = $this->db->get_where('tbl_user', ['username' => $username])->row();
					echo $row->full_name;
					?>
				</td>
			</tr>
			<tr>
				<td>Prestasi</td>
				<td><?php echo $prestasi; ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><?php echo $kelas; ?></td>
			</tr>
			<tr>
				<td>Tgl</td>
				<td><?php echo $tgl; ?></td>
			</tr>
		</table>
		<a href="<?php echo site_url('lap_prestasi') ?>" class="btn btn-secondary">Cancel</a>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->