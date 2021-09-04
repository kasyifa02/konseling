<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?php echo $button ?></h1>


    <form action="<?php echo $action; ?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Nisn <?php echo form_error('username') ?></label>
                    <!-- <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" /> -->
                    <?php echo cmb_dinamis_where('username', 'tbl_user', 'full_name', 'username', $id_kelas, 'ASC', "id_kelas", "id_user_level", 10) ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="pelanggaran">Pelanggaran <?php echo form_error('pelanggaran') ?></label>
                    <?php echo cmb_dinamis('pelanggaran', 'm_pelanggaran', 'nama_pelanggaran', 'nama_pelanggaran', $pelanggaran, 'ASC') ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="sanksi">Sanksi <?php echo form_error('sanksi') ?></label>
                    <?php echo cmb_dinamis('sanksi', 'm_sanksi', 'nama_sanksi', 'nama_sanksi', $sanksi, 'ASC') ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="varchar">Kelas <?php echo form_error('kelas') ?></label>
                    <input type="text" readonly class="form-control" name="kelas" id="kelas" placeholder="Kelas" value="<?php echo $kelas; ?>" />
                </div>
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
            echo  "<a href=" . site_url('pelanggaran/kelas/1') . " class='btn btn-secondary'>Cancel</a>";
        } elseif ($kelas == 2) {
            echo  "<a href=" . site_url('pelanggaran/kelas/2') . " class='btn btn-secondary'>Cancel</a>";
        } elseif ($kelas == 3) {
            echo  "<a href=" . site_url('pelanggaran/kelas/3') . " class='btn btn-secondary'>Cancel</a>";
        } else {
            echo  "<a href=" . site_url('pelanggaran') . " class='btn btn-secondary'>Cancel</a>";
        }
        ?>
        <!-- <a href="<?php echo site_url('pelanggaran') ?>" class="btn btn-secondary">Cancel</a> -->
    </form>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->