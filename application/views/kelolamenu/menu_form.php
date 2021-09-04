<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

    <div class="col-lg-6">
        <form method="POST" action="<?= $action ?>">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" name="title" value="<?= $title ?>" placeholder="Nama title">
            </div>
            <div class="form-group">
                <label for="url">Url</label>
                <input type="text" class="form-control" id="url" name="url" value="<?= $url ?>" placeholder="Url">
            </div>
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" class="form-control" id="icon" name="icon" value="<?= $icon ?>" placeholder="Icon">
            </div>
            <div class="form-group">
                <label for="is_main_menu">Main Menu</label>
                <select class="custom-select" name="is_main_menu" id="is_main_menu">
                    <option value="0">Main Menu</option>
                    <?php
                    $query = "SELECT * FROM tbl_menu ORDER BY id_menu ASC";
                    $menu = $this->db->query($query)->result();

                    foreach ($menu as $mn) :
                        if ($mn->id_menu == $is_main_menu) :
                    ?>
                            <option selected value="<?= $mn->id_menu ?>"><?= $mn->title ?></option>
                        <?php
                        elseif ($mn->id_menu == 0) : ?>
                            <option selected value="<?= $mn->id_menu ?>">Main Menu</option>
                        <?php
                        else : ?>
                            <option value="<?= $mn->id_menu ?>"><?= $mn->title ?></option>
                    <?php
                        endif;
                    endforeach; ?>
                </select>
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
            <input type="hidden" class="form-control" id="id_menu" name="id_menu" value="<?= $id_menu ?>">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a type="button" class="btn  btn-secondary" href="<?= base_url('kelolamenu') ?>">Batal</a>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->