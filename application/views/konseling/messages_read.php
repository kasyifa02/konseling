
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $title ?> Detail</h1>
<div class="table-responsive">
        <table class="table table-hover table-bordered">
	    <tr><td>Name</td><td><?php echo $name; ?></td></tr>
	    <tr><td>Ke</td><td><?php echo $ke; ?></td></tr>
	    <tr><td>Avatar</td><td><?php echo $avatar; ?></td></tr>
	    <tr><td>Message</td><td><?php echo $message; ?></td></tr>
	    <tr><td>Tipe</td><td><?php echo $tipe; ?></td></tr>
	    <tr><td>Date</td><td><?php echo $date; ?></td></tr>
	</table>
<a href="<?php echo site_url('konseling') ?>" class="btn btn-secondary">Cancel</a>
</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
  