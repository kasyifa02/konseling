<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-flex mb-3 mb-3">
        <h1 class="mr-auto h3 mb-0 text-gray-800"><?= $title ?></h1>
    </div>

    <?= $this->session->flashdata('message'); ?>
    <!--data table-->
    <div class="card shadow mb-4">
        <div class="card-header py-3">

            <h6 class="m-0 font-weight-bold text-primary">
                <?php
                $kelas = $this->uri->segment(2);
                $int = $this->uri->segment(3);
                if ($kelas == $kelas && $int == 1) {
                    echo  $title . " <span> " . anchor(site_url('prestasi/create/1'), ' Create', 'class="badge badge-pill badge-primary"') . "</span>";
                } elseif ($kelas == $kelas && $int == 2) {
                    echo  $title . " <span> " . anchor(site_url('prestasi/create/2'), ' Create', 'class="badge badge-pill badge-primary"') . "</span>";
                } elseif ($kelas == $kelas && $int == 3) {
                    echo  $title . " <span> " . anchor(site_url('prestasi/create/3'), ' Create', 'class="badge badge-pill badge-primary"') . "</span>";
                }

                ?>
                <!-- <?= $title ?> <span> <?php echo anchor(site_url('prestasi/create'), 'Create', 'class="badge badge-pill badge-primary"'); ?> </span> -->
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
                                    <td style="text-align:center" width="200px"><span> <?= anchor(site_url('prestasi/read/' . $prestasi->id), 'Read', 'class="badge badge-pill badge-primary"') ?> </span><span> <?= anchor(site_url('prestasi/update/' . $prestasi->id), 'Update', 'class="badge badge-pill badge-success"') ?> </span><span> <?= anchor(site_url('prestasi/delete/' . $prestasi->id), 'Delete', 'class="badge badge-pill badge-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"') ?> </span></td>
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