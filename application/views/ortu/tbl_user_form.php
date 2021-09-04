<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">Full Name <?php echo form_error('full_name') ?></label>
            <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Username <?php echo form_error('username') ?></label>
            <input type="text" class="form-control" minlength="16" maxlength="20" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </div>
        <div class="form-group">
            <label for="varchar">Password <?php echo form_error('password') ?></label>
            <input type="password" class="form-control" minlength="6" maxlength="20" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
        </div>

        <div class="form-group">
            <label for="int">Id User Level <?php echo form_error('id_user_level') ?></label>
            <!-- <input type="text" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" /> -->
            <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'DESC') ?>
        </div>

        <div class="form-group">
            <label for="int">Nisn Anak <?php echo form_error('id_kelas') ?></label>
            <input type="text" class="form-control" minlength="9" maxlength="10" name="id_kelas" id="id_kelas" placeholder="Nisn Anak" value="<?php echo $id_kelas; ?>" />
        </div>

        <div class="form-group">
            <label for="enum">Is Aktif <?php echo form_error('is_aktif') ?></label>
            <!-- <input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" /> -->
            <?php echo form_dropdown('is_aktif', array('y' => 'Aktif', 'n' => 'Tidak Aktif'), $is_aktif, array('class' => 'form-control')); ?>
        </div>
        <div class="form-group">
            <label for="images">Images <?php echo form_error('images') ?></label>
            <input type="file" name="images" id="images"><?php echo $images; ?></input>
        </div>
        <input type="hidden" name="id_users" value="<?php echo $id_users; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <a href="<?php echo site_url('guru') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->