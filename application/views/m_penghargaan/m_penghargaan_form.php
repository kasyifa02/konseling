
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>

        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Penghargaan <?php echo form_error('nama_penghargaan') ?></label>
            <input type="text" class="form-control" name="nama_penghargaan" id="nama_penghargaan" placeholder="Nama Penghargaan" value="<?php echo $nama_penghargaan; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_penghargaan') ?>" class="btn btn-secondary">Cancel</a>
	</form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
   