<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>

    <?= $this->session->flashdata('message'); ?>

    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Full Name <?php echo form_error('full_name') ?></label>
                    <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Full Name" value="<?php echo $full_name; ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Username <?php echo form_error('username') ?></label>
                    <input type="text" class="form-control" minlength="16" maxlength="20" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                    <input type="text" class="form-control" minlength="6" maxlength="20" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="int">Id User Level <?php echo form_error('id_user_level') ?></label>
                    <!-- <input type="text" class="form-control" name="id_user_level" id="id_user_level" placeholder="Id User Level" value="<?php echo $id_user_level; ?>" /> -->
                    <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'nama_level', 'id_user_level', $id_user_level, 'DESC') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="int">Kelas <?php echo form_error('id_kelas') ?></label>
                    <?php echo cmb_dinamis('id_kelas', 'tbl_kelas', 'kelas', 'id', $id_kelas, 'ASC') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="enum">Is Aktif <?php echo form_error('is_aktif') ?></label>
                    <!-- <input type="text" class="form-control" name="is_aktif" id="is_aktif" placeholder="Is Aktif" value="<?php echo $is_aktif; ?>" /> -->
                    <?php echo form_dropdown('is_aktif', array('y' => 'Aktif', 'n' => 'Tidak Aktif'), $is_aktif, array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Email <?php echo form_error('email') ?></label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">No Hp <?php echo form_error('no_hp') ?></label>
                    <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="Number phone" value="<?php echo $no_hp; ?>" />
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="varchar">Alamat<?php echo form_error('alamat') ?></label>
            <textarea class="form-control" name="alamat" id="alamat" placeholder="Address"><?php echo $alamat; ?></textarea>
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