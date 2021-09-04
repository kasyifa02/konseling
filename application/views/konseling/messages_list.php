<!-- Begin Page Content -->
<div class="container-fluid h-100">
    <div class="row">
        <div class="col-md-4 chat">
            <div class="card mb-sm-3 mb-md-0 contacts_card">
                <div class="card-header bg-primary">
                    <div class="input-group">
                        <input type="text" placeholder="Search..." name="" class="form-control search">
                        <div class="input-group-prepend">
                            <span class="input-group-text search_btn"><i class="fas fa-search"></i></span>
                        </div>
                    </div>
                </div>
                <div class="card-body contacts_body">
                    <ui class="contacts">
                        <?php
                        foreach ($users_data as $user) :
                        ?>
                            <a href="<?= base_url('konseling/chat/') . $user->username ?>">
                                <li class="active">
                                    <div class="d-flex alert alert-secondary mb-0">
                                        <div class="img_cont">
                                            <img src="<?= base_url('assets/img/profile/') . $user->images ?>" class="rounded-circle user_img">
                                            <!-- <span class="online_icon"></span> -->
                                        </div>
                                        <div class="user_info">
                                            <span class="text-dark"><?= $user->full_name ?></span>
                                            <!-- <p>Kalid is online</p> -->
                                        </div>
                                    </div>
                                </li>
                            </a>
                        <?php
                        endforeach;
                        ?>
                    </ui>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-lg-8 col-md-8  chat">
            <div class="card">
                <div class="card-header msg_head bg-primary">
                    <div class="d-flex">
                        <?php
                        $uri = $this->uri->segment(2);
                        $uri_id = $this->uri->segment(3);
                        $result = "";
                        if ($uri == "chat") :
                            $this->db->where('username', $uri_id);
                            $result = $this->db->get('tbl_user')->row();

                        ?>
                            <div class="img_cont">
                                <img src="<?= base_url('assets/img/profile/') . $result->images ?>" class="rounded-circle user_img">
                                <!-- <span class="online_icon"></span> -->
                            </div>
                            <div class="user_info">
                                <span><?= $result->full_name ?></span>
                                <p><?= $this->session->flashdata('message');
                                    ?></p>
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                </div>
                <div class="card-body msg_card_body">
                    <!-- start chat -->
                    <?php
                    $uri = $this->uri->segment(2);
                    $uri_id = $this->uri->segment(3);
                    $result = "";
                    if ($uri == "chat") :
                        $username = $this->session->userdata('username');
                        $level = $this->session->userdata('id_user_level');

                        if ($level == 2) :
                            foreach ($konseling_data as $konseling) :
                                $result = $this->db->get_where('tbl_user', ['username' => $konseling->name])->row();
                                if ($konseling->name == $username) :
                    ?>

                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            <?= $konseling->message ?>
                                            <!-- <span class="msg_time_send">8:55 AM, Today</span> -->
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="<?= base_url('assets/img/profile/') . $result->images ?>" class="rounded-circle user_img_msg">
                                        </div>
                                    </div>
                                <?php
                                else :
                                    $result = $this->db->get_where('tbl_user', ['username' => $uri_id])->row();

                                ?>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="<?= base_url('assets/img/profile/') . $result->images ?>" class="rounded-circle user_img_msg">
                                        </div>
                                        <div class="msg_cotainer">
                                            <?= $konseling->message ?>
                                            <!-- <span class="msg_time">8:40 AM, Today</span> -->
                                        </div>
                                    </div>
                    <?php
                                endif;
                            endforeach;
                        endif;
                    endif;
                    ?>
                    <!-- end chat -->

                    <?php
                    $uri = $this->uri->segment(2);
                    $uri_id = $this->uri->segment(3);
                    $result = "";
                    if ($uri == "chat") :
                        $username = $this->session->userdata('username');
                        $level = $this->session->userdata('id_user_level');

                        if ($level == 10) :
                            foreach ($konseling_data as $konseling) :
                                $result = $this->db->get_where('tbl_user', ['username' => $konseling->name])->row();
                                if ($konseling->name == $username) :
                    ?>

                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="msg_cotainer_send">
                                            <?= $konseling->message ?>
                                            <!-- <span class="msg_time_send">8:55 AM, Today</span> -->
                                        </div>
                                        <div class="img_cont_msg">
                                            <img src="<?= base_url('assets/img/profile/') . $result->images ?>" class="rounded-circle user_img_msg">
                                        </div>
                                    </div>
                                <?php
                                else :
                                    $result = $this->db->get_where('tbl_user', ['username' => $uri_id])->row();

                                ?>
                                    <div class="d-flex justify-content-start mb-4">
                                        <div class="img_cont_msg">
                                            <img src="<?= base_url('assets/img/profile/') . $result->images ?>" class="rounded-circle user_img_msg">
                                        </div>
                                        <div class="msg_cotainer">
                                            <?= $konseling->message ?>
                                            <!-- <span class="msg_time">8:40 AM, Today</span> -->
                                        </div>
                                    </div>
                    <?php
                                endif;
                            endforeach;
                        endif;
                    endif;
                    ?>
                    <!-- end chat -->
                </div>
                <?php
                $uri = $this->uri->segment(2);
                $uri_id = $this->uri->segment(3);
                if ($uri == "chat") :
                ?>
                    <div class="card-footer">
                        <div class="input-group ">
                            <div class="input-group-append ">
                                <span class="input-group-text bg-primary attach_btn"><i class="fas fa-paperclip"></i></span>
                            </div>
                            <input name="message" id="message" type="text" class="form-control alert alert-secondary type_msg" required placeholder="Type your message..."></input>
                            <div class="input-group-append" onclick="send_message()">
                                <span class="input-group-text send_btn bg-primary"><i class="fas fa-location-arrow"></i></span>
                            </div>
                        </div>
                    </div>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->