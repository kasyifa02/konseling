<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-6 text-gray-800"><?= $title ?></h1>
    <div class="card mb-6" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4 bg-dark">
                <img src="<?= base_url('assets/img/profile/') . $user['images'] ?>" width="180" class="img-responsive">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <table>
                        <tr>
                            <th>Nama</th>
                            <td>:</td>
                            <td><?= ucwords($user['full_name']) ?></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>:</td>
                            <td><?= $user['username'] ?></td>
                        </tr>
                        <?php
                        $level = $this->session->userdata('id_user_level');
                        if ($level == 11) :
                        ?>
                            <tr>
                                <th>Nisn Anak</th>
                                <td>:</td>
                                <td><?= $user['id_kelas'] ?></td>
                            </tr>
                            <?php
                        endif;
                        if ($level != 11) :
                            if ($level == 9) :
                            ?>
                                <tr>
                                    <th>Wali Kelas</th>
                                    <td>:</td>
                                    <td><?= $user['id_kelas'] ?></td>
                                </tr>
                            <?php
                            endif;
                        endif;
                        if ($level == 2 or $level == 9 or $level == 12) {
                            $row = $this->db->get_where("tbl_guru", ["nip" => $user['username']])->row();
                        } elseif ($level == 9) {
                            $row = $this->db->get_where("tbl_siswa", ["nisn" => $user['username']])->row();
                            if ($row) {

                                echo "
                                <tr>
                                <th>Nama Orang Tua</th>
                                <td>:</td>
                                <td>$row->nama_ortu</td>
                            </tr>
                                ";
                            }
                        } elseif ($level == 11) {
                            $row = $this->db->get_where("tbl_siswa", ["nisn" => $user['id_kelas']])->row();
                        } else {
                            $row = $this->db->get_where("tbl_siswa", ["nisn" => $user['username']])->row();
                            if ($row) {

                                echo "
                                <tr>
                                <th>Nama Orang Tua</th>
                                <td>:</td>
                                <td>$row->nama_ortu</td>
                            </tr>
                                ";
                            }
                        }
                        if ($row) :
                            ?>
                            <tr>
                                <th>Email</th>
                                <td>:</td>
                                <td><?= $row->email ?></td>
                            </tr>
                            <tr>
                                <th>No Hp</th>
                                <td>:</td>
                                <td><?= $row->no_hp ?></td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>:</td>
                                <td><?= $row->alamat ?></td>
                            </tr>
                        <?php
                        endif;
                        ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->