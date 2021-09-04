<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    } else {
        $user_level = $ci->session->userdata('id_user_level');
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('tbl_menu', ['url' => $menu])->row_array();

        $idMenu = $queryMenu['id_menu'];

        $queryAccess = $ci->db->get_where('tbl_hak_akses', [
            'id_user_level' => $user_level,
            'id_menu' => $idMenu
        ]);

        if ($queryAccess->num_rows() < 1) {
            redirect('auth/bloked');
        }
    }
}


function make_id($huruf, $field, $table)
{
    $ci = get_instance();
    $cek    = $ci->db->select("RIGHT($field,4) AS code", FALSE)->from($table)->order_by($field, 'DESC')->get()->row_array();

    $serial = $cek['code'] + 1;
    $code   = str_pad($serial, 4, '0', STR_PAD_LEFT);
    $kd     = $huruf . date('dmy') . $code;

    return $kd;
}

function cmb_dinamis($name, $table, $field, $pk, $selected = null, $order = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}


function cmb_dinamis_where($name, $table, $field, $pk, $selected = null, $order = null, $id = null, $a = null, $b = null)
{
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    if ($order) {
        $ci->db->order_by($field, $order);
    }
    $ci->db->where($id, $selected);
    $ci->db->where($a, $b);
    $data = $ci->db->get($table)->result();
    foreach ($data as $d) {
        $cmb .= "<option value='" . $d->$pk . "'";
        $cmb .= $selected == $d->$pk ? " selected='selected'" : '';
        $cmb .= ">" .  strtoupper($d->$field) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}


function cek_akses($id_userlevel, $id_submenu)
{
    $ci = get_instance();
    $ci->db->where('id_user_level', $id_userlevel);
    $ci->db->where('id_menu', $id_submenu);
    $result = $ci->db->get('tbl_hak_akses');

    if ($result->num_rows() > 0) {
        return "checked = 'checked'";
    }
}

function uploadImage($path = "./assets/img/", $types = "jpg|png|jpeg")
{
    # code...
}
