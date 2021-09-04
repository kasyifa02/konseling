<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="col-lg-6">
        <form method="POST" action="<?= $action ?>">
            <div class="form-group">
                <label for="nama_level">Nama Level</label>
                <input type="text" class="form-control" id="nama_level" name="nama_level" value="<?= $nama_level ?>">
            </div>
            <input type="hidden" class="form-control" id="id_user_level" name="id_user_level" value="<?= $id_user_level ?>">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a type="button" class="btn btn-secondary" href="<?= base_url('kelolauserlevel') ?>">Batal</a>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->