
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>

        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Sanksi <?php echo form_error('nama_sanksi') ?></label>
            <input type="text" class="form-control" name="nama_sanksi" id="nama_sanksi" placeholder="Nama Sanksi" value="<?php echo $nama_sanksi; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('m_sanksi') ?>" class="btn btn-secondary">Cancel</a>
	</form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
   