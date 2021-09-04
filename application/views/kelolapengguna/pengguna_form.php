<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <?= validation_errors(
        '<div class="alert alert-danger role="alert">',
        '</div>'
    );
    ?>
    <div class="col-lg-6">
        <form method="POST" action="<?= $action ?>">
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $full_name ?>" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
                <label for="no_telp">No Handphone</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $no_telp ?>" placeholder="No Handphone">
            </div>

            <div class="form-group">
                <label for="is_aktif">Is Aktif</label>
                <select class="custom-select" name="is_aktif" id="is_aktif">
                    <?php if ($is_aktif == 'y') : ?>
                        <option selected value="y">Aktif</option>
                        <option value="t">Tidak Aktif</option>
                    <?php else : ?>
                        <option value="y">Aktif</option>
                        <option selected value="t">Tidak Aktif</option>
                    <?php endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="id_user_level">Level User</label>
                <select class="custom-select" name="id_user_level" id="id_user_level">
                    <?php
                    $query = "SELECT * FROM tbl_user_level ";
                    $row = $this->db->query($query)->result();
                    $selected = "";
                    foreach ($row as $r) :
                        if ($id_user_level ==  $r->id_user_level) :
                            $selected = "selected";
                        else :
                            $selected = "";
                        endif; ?>
                        <option <?= $selected ?> value="<?= $r->id_user_level ?>"><?= $r->nama_level ?></option>
                    <?php endforeach; ?>

                </select>
            </div>
            <input type="hidden" class="form-control" id="id_users" name="id_users" value="<?= $id_users ?>">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a type="button" class="btn  btn-secondary" href="<?= base_url('kelolapengguna') ?>">Batal</a>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->