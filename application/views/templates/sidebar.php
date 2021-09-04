<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon ">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sim Konseling</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->

    <?php
    $idLevel = $this->session->userdata('id_user_level');
    if ($idLevel == 1 or $idLevel == 3) :
        if ($this->uri->segment(1) == 'dashboard') {
            $active = 'active';
        } else {
            $active = '';
        }

    ?>
        <li class="nav-item <?= $active ?>">
            <a class="nav-link" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

    <?php endif;
    ?>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <?php

    $id_user_level = $this->session->userdata('id_user_level');
    $sql_menu = "SELECT * 
                FROM tbl_menu 
                WHERE id_menu IN(SELECT id_menu FROM tbl_hak_akses WHERE id_user_level=$id_user_level) AND is_main_menu= 0 AND is_aktif='y'";

    $uri = $this->uri->segment(1);
    $main_menu = $this->db->query($sql_menu)->result();


    foreach ($main_menu as $menu) :



        // chek is have sub menu
        $ceksub = $this->db->query("SELECT is_main_menu FROM tbl_menu WHERE URL='$uri' ")->result();

        $submenu = $this->db->query("SELECT * 
                    FROM tbl_menu 
                    WHERE id_menu in(select id_menu from tbl_hak_akses where id_user_level=$id_user_level) and is_main_menu='$menu->id_menu' and is_aktif='y'");


        if ($submenu->num_rows() > 0) :
            // display sub menu
            foreach ($ceksub as $ceks) :
                if ($ceks->is_main_menu == $menu->id_menu) {
                    $active = 'active';
                    $collapsed = '';
                    $true = 'false';
                    $show = 'show';
                } else {
                    $active = '';
                    $collapsed = 'collapsed';
                    $true = 'true';
                    $show = '';
                }

            endforeach;

    ?>
            <li class="nav-item <?= $active ?>">
                <a class="nav-link <?= $collapsed ?>" href="#" data-toggle="collapse" data-target="#collapseTwo<?= $menu->id_menu ?>" aria-expanded="<?= $true ?>" aria-controls="collapseTwo<?= $menu->id_menu ?>">
                    <i class="<?= $menu->icon ?>"></i>
                    <span><?= ucfirst($menu->title) ?></span>
                </a>
                <div id="collapseTwo<?= $menu->id_menu ?>" class="collapse open <?= $show ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <?php
                        foreach ($submenu->result() as $sm) :
                            if ($uri == $sm->url) :
                        ?>
                                <a class="collapse-item active" href="<?= base_url($sm->url) ?>"><?= $sm->title ?></a>
                            <?php else : ?>
                                <a class="collapse-item" href="<?= base_url($sm->url) ?>"><?= $sm->title ?></a>
                        <?php endif;
                        endforeach; ?>
                    </div>
                </div>
            </li>
            <?php

        else :
            foreach ($submenu->result() as $sm) :
                if ($uri == $sm->url) :
            ?>
                    <a class="collapse-item active" href="<?= base_url($sm->url) ?>"><?= $sm->title ?></a>
                <?php else : ?>
                    <a class="collapse-item" href="<?= base_url($sm->url) ?>"><?= $sm->title ?></a>
    <?php
                endif;
            endforeach;
        endif;
    endforeach; ?>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user/changepassword') ?>">
            <i class="fas fa-lock"></i>
            <span>Ganti Password</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->