<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <?= $this->session->flashdata('message'); ?>
    <?php echo form_error(
        'full_name',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );
    echo form_error(
        'no_telp',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );

    echo form_error(
        'password',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );


    echo form_error(
        'passconf',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );
    ?>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?= $title ?> <span data-toggle="modal" data-target="#addPenggunaModal" class="badge badge-pill badge-primary">Tambah Data</span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2" style="align-items: center;">No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Nama Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Nama Level</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($kelola_pengguna as $pengguna) :
                        ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $pengguna['full_name'] ?></td>
                                <td><?= $pengguna['email'] ?></td>
                                <?php $query = "SELECT nama_level FROM tbl_user_level WHERE id_user_level = '$pengguna[id_user_level]'";
                                $level = $this->db->query($query)->row();
                                ?>
                                <td><?= $level->nama_level ?></td>
                                <td><?= $pengguna['is_aktif'] ?></td>
                                <td>
                                    <a href="<?= base_url('kelolapengguna/edit/') . $pengguna['id_users'] ?>" class="badge badge-pill badge-success">edit</a>
                                    <a href="<?= base_url('kelolapengguna/hapus/') . $pengguna['id_users'] ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus Data?')">Hapus</a>

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

<!-- Modal Add-->
<div class="modal fade" id="addPenggunaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('kelolapengguna') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Sandi">

                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="passconf" name="passconf" placeholder="Konfirmasi Sandi">

                        </div>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="no_telp" name="no_telp" maxlength="13" placeholder="No Handphone">
                    </div>
                    <div class="form-group">
                        <label for="is_aktif">Is Aktif</label>
                        <select class="custom-select" name="is_aktif" id="is_aktif">
                            <option value="y">Aktif</option>
                            <option value="t">Tidak Aktif</option>
                        </select>
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