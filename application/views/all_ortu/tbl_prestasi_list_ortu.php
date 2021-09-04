<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-flex mb-3 mb-3">
        <h1 class="mr-auto h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>
    <?php
    $level = $this->session->userdata('id_user_level');
    if ($level == 12) :
    ?>
        <form action="<?= base_url('lap_prestasi/cetak') ?>" method="post">
            <div class="row mb-3">
                <div class="col">
                    <label for="">Dari</label>
                    <input type="date" class="form-control" name="dari" placeholder="First name">
                </div>
                <div class="col">
                    <label for="">Sampai</label>
                    <input type="date" class="form-control" name="sampai" placeholder="Last name">
                </div>
                <div class="col">
                    <label for="">Print</label>
                    <button type="submit" class="form-control btn btn-primary"><i class="fa fa-print"></i></button>
                </div>
            </div>
        </form>
    <?php
    endif;
    ?>
    <?= $this->session->flashdata('message'); ?>
    <!--data table-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                <?= $title ?>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2" style="align-items: center;">No</th>
                            <th>Username</th>
                            <th>Prestasi</th>
                            <th>Kelas</th>
                            <th>Tgl</th>
                            <th>Action</th>
                        </tr>
                        <thead>

                        <tfoot>
                            <tr>
                                <th width="2" style="align-items: center;">No</th>
                                <th>Username</th>
                                <th>Prestasi</th>
                                <th>Kelas</th>
                                <th>Tgl</th>
                                <th>Action</th>
                            </tr>
                    <tfoot>
                        <?php
                        foreach ($prestasi_data as $prestasi) {
                        ?> <tbody>
                                <tr>

                                    <td width="80px"><?php echo $start++ ?></td>
                                    <td>
                                        <?php
                                        $row = $this->db->get_where('tbl_user', ['username' => $prestasi->username])->row();
                                        echo $row->full_name;
                                        ?>
                                    </td>
                                    <td><?php echo $prestasi->prestasi ?></td>
                                    <td><?php echo $prestasi->kelas ?></td>
                                    <td><?php echo $prestasi->tgl ?></td>
                                    <td style="text-align:center" width="200px">
                                        <span> <?= anchor(site_url('lap_prestasi/read/' . $prestasi->id), 'Read', 'class="badge badge-pill badge-primary"') ?> </span>
                                        <?php
                                        if ($user['id_user_level'] == 12) :
                                        ?>
                                            <span> <?= anchor(site_url('lap_prestasi/print/' . $prestasi->username), 'Cetak', 'class="badge badge-pill badge-warning"') ?> </span>
                                        <?php
                                        endif;
                                        ?>
                                    </td>
                                </tr>
                            <tbody>
                            <?php
                        }
                            ?>

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->