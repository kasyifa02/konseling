<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>


    <form action="<?php echo $action; ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Username <?php echo form_error('username') ?></label>
                    <!-- <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /> -->
                    <?php echo cmb_dinamis_where('username', 'tbl_user', 'full_name', 'username', $id_kelas, 'ASC', "id_kelas", "id_user_level", 10) ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prestasi">Prestasi <?php echo form_error('prestasi') ?></label>
                    <?php echo cmb_dinamis('prestasi', 'm_prestasi', 'nama_prestasi', 'nama_prestasi', $prestasi, 'ASC') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="prestasi">Penghargaan <?php echo form_error('penghargaan') ?></label>
                    <?php echo cmb_dinamis('penghargaan', 'm_penghargaan', 'nama_penghargaan', 'nama_penghargaan', $penghargaan, 'ASC') ?>
                </div>
            </div>
            <div class="col-md-6">
                <label for="varchar">Kelas <?php echo form_error('kelas') ?></label>
                <input type="text" readonly class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
            </div>
        </div>
        <div class="form-group">
            <label for="date">Tgl <?php echo form_error('tgl') ?></label>
            <input type="date" class="form-control" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button>
        <?php
        $kelas = $this->uri->segment(3);
        if ($kelas == 1) {
            echo  "<a href=" . site_url('prestasi/kelas/1') . " class='btn btn-secondary'>Cancel</a>";
        } elseif ($kelas == 2) {
            echo  "<a href=" . site_url('prestasi/kelas/2') . " class='btn btn-secondary'>Cancel</a>";
        } elseif ($kelas == 3) {
            echo  "<a href=" . site_url('prestasi/kelas/3') . " class='btn btn-secondary'>Cancel</a>";
        } else {
            echo  "<a href=" . site_url('prestasi') . " class='btn btn-secondary'>Cancel</a>";
        }
        ?>
        <!-- <a href="<?php echo site_url('prestasi') ?>" class="btn btn-secondary">Cancel</a> -->
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->