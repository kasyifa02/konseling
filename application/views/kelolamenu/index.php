<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


    <?= $this->session->flashdata('message'); ?>
    <?php echo form_error(
        'title',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );
    echo form_error(
        'url',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );

    echo form_error(
        'icon',
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );
    ?>



    <!-- <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#addMenuModal">Tambah Data</button> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> <?= $title ?> <span data-toggle="modal" data-target="#addMenuModal" class="badge badge-pill badge-primary">Tambah Data</span></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="2" style="align-items: center;">No</th>
                            <th>title</th>
                            <th>Url</th>
                            <th>Is Main Menu</th>
                            <th>Is Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>title</th>
                            <th>Url</th>
                            <th>Is Main Menu</th>
                            <th>Is Aktif</th>
                            <th>Aksi</th>
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
                                <td><?= $m['url'] ?></td>
                                <?php $query = "SELECT title FROM tbl_menu WHERE id_menu = '$m[is_main_menu]'";
                                $main = $this->db->query($query)->row();
                                $is_main_menu = "";

                                if ($m['is_main_menu'] == 0) {
                                    $is_main_menu = "Main Menu";
                                } else {
                                    $is_main_menu = $main->title;
                                } ?>
                                <td><?= $is_main_menu ?></td>
                                <td><?= $m['is_aktif'] ?></td>
                                <td>
                                    <a href="<?= base_url('kelolamenu/edit/') . $m['id_menu'] ?>" class="badge badge-pill badge-success">edit</a>
                                    <a href="<?= base_url('kelolamenu/hapus/') . $m['id_menu'] ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin Hapus Data?')">Hapus</a>

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
<div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('kelolamenu') ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Nama title">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="Url">
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="Icon">
                    </div>
                    <div class="form-group">
                        <label for="is_main_menu">Main Menu</label>
                        <select class="custom-select" name="is_main_menu" id="is_main_menu">
                            <?php
                            $query = "SELECT * FROM tbl_menu ORDER BY id_menu ASC";
                            $main_main = $this->db->query($query)->result();
                            echo '<option value="0">Main Menu</option>';
                            foreach ($main_main as $mn) :
                            ?>
                                <option value="<?= $mn->id_menu ?>"><?= $mn->title ?></option>
                            <?php endforeach; ?>
                        </select>
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