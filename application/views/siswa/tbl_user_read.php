<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?php echo $title ?> Detail</h1>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<tr>
				<td>Full Name</td>
				<td><?php echo $full_name; ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $username; ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $password; ?></td>
			</tr>
			<tr>
				<td>Images</td>
				<td><?php echo $images; ?></td>
			</tr>
			<tr>
				<td>Id User Level</td>
				<td><?php echo $id_user_level; ?></td>
			</tr>
			<tr>
				<td>Is Aktif</td>
				<td><?php echo $is_aktif; ?></td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td><?php echo $id_kelas; ?></td>
			</tr>
		</table>
		<a href="<?php echo site_url('siswa') ?>" class="btn btn-secondary">Cancel</a>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->