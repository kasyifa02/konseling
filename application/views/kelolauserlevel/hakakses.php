<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>

    <?= $this->session->flashdata('message') ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Akses Menu : <?= ucwords($hak_akses['nama_level']); ?> <a href="<?= base_url('kelolauserlevel'); ?>" class="badge badge-pill badge-secondary">Kembali</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2" style="align-items: center;">No</th>
                            <th>Nama Menu</th>
                            <th>Akses</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Akses</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($menu as $m) :
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $m['title'] ?></td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" <?= cek_akses($hak_akses['id_user_level'], $m['id_menu']) ?> data-level="<?= $hak_akses['id_user_level'] ?> " data-menu="<?= $m['id_menu'] ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->