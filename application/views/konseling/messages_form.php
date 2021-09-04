
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>

        
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="name">Name <?php echo form_error('name') ?></label>
            <textarea class="form-control" rows="3" name="name" id="name" placeholder="Name"><?php echo $name; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="ke">Ke <?php echo form_error('ke') ?></label>
            <textarea class="form-control" rows="3" name="ke" id="ke" placeholder="Ke"><?php echo $ke; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Avatar <?php echo form_error('avatar') ?></label>
            <input type="text" class="form-control" name="avatar" id="avatar" placeholder="Avatar" value="<?php echo $avatar; ?>" />
        </div>
	    <div class="form-group">
            <label for="message">Message <?php echo form_error('message') ?></label>
            <textarea class="form-control" rows="3" name="message" id="message" placeholder="Message"><?php echo $message; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Tipe <?php echo form_error('tipe') ?></label>
            <input type="text" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="<?php echo $tipe; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Date <?php echo form_error('date') ?></label>
            <input type="text" class="form-control" name="date" id="date" placeholder="Date" value="<?php echo $date; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('konseling') ?>" class="btn btn-secondary">Cancel</a>
	</form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
   