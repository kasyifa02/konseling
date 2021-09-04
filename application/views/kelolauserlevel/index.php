<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="col-lg-6">
        <?= $this->session->flashdata('message'); ?>
        <?php echo form_error(
            'nama_level',
            '<div class="alert alert-danger role="alert">',
            '</div>'
        );
        ?>



        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addUserLevelModal">Tambah Data</button>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>

                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">User Level</th>
                        <th scope="col">Aksi</th>

                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($user_level as $ul) : ?>
                        <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $ul['nama_level'] ?></td>
                            <td>
                                <a href="<?= base_url('kelolauserlevel/hak_akses/') . $ul['id_user_level'] ?>" class="badge badge-pill badge-warning">akses</a>
                                <a href="<?= base_url('kelolauserlevel/edit/') . $ul['id_user_level'] ?>" class="badge badge-pill badge-success">edit</a>
                                <a href="<?= base_url('kelolauserlevel/hapus/') . $ul['id_user_level'] ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus Data?')">Hapus</a>
                            </td>
                        </tr>
                    <?php $i++;
                    endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add-->
<div class="modal fade" id="addUserLevelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('kelolauserlevel') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_level" name="nama_level" placeholder="Nama Level">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>