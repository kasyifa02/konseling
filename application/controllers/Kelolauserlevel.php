<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelolauserlevel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('Userlevel_Model', 'userlevel');
    }

    public function index()
    {
        $data['title'] = 'Kelola User Level';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['user_level'] = $this->db->get('tbl_user_level')->result_array();

        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelolauserlevel/index', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_level' => $this->input->post('nama_level')
            ];

            $query = $this->db->insert('tbl_user_level', $data);
            // var_dump($query);
            // die;
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('kelolauserlevel'));
        }
    }

    public function edit($id)
    {

        $row = $this->userlevel->get_by_id($id);

        if ($row) {
            $data = [
                'title' => 'Edit User Level',
                'action' => site_url('kelolauserlevel/edit_action'),
                'id_user_level' => set_value('id_user_level', $row->id_user_level),
                'nama_level' => set_value('nama_level', $row->nama_level)
            ];

            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelolauserlevel/userlevel_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Data Tidak Ada
            </div>');
            redirect(site_url('kelolauserlevel'));
        }
    }

    public function edit_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->edit($this->input->post('id_user_level', TRUE));
        } else {
            $data = [
                'nama_level' => $this->input->post('nama_level')
            ];

            $this->userlevel->update($this->input->post('id_user_level', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Edit Data Berhasil
            </div>');
            redirect(site_url('kelolauserlevel'));
        }
    }

    public function hapus($id)
    {
        $this->userlevel->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Hapus Data Berhasil
            </div>');
        redirect(site_url('kelolauserlevel'));
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_level', 'Nama Level', 'required|trim');
    }

    public function hak_akses($id)
    {
        $data['title'] = 'Kelola Hak Akses';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $data['hak_akses'] = $this->db->get_where('tbl_user_level', ['id_user_level' => $id])->row_array();
        $data['menu'] = $this->db->get('tbl_menu')->result_array();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelolauserlevel/hakakses', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'nama_level' => $this->input->post('nama_level')
            ];

            $query = $this->db->insert('tbl_user_level', $data);
            var_dump($query);
            die;
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('kelolauserlevel'));
        }
    }
    // ada di footer script
    public function ganti_akses()
    {
        $idSubMenu = $this->input->post('menuId');
        $idLevel = $this->input->post('levelId');

        $data = [
            'id_user_level' => $idLevel,
            'id_menu' => $idSubMenu
        ];

        $result = $this->db->get_where('tbl_hak_akses', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tbl_hak_akses', $data);
        } else {
            $this->db->delete('tbl_hak_akses', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Akses Berhasil diubah!
            </div>');
    }
}
