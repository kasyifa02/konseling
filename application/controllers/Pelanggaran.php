<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pelanggaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Pelanggaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $pelanggaran = $this->Pelanggaran_model->get_all();

        $data = array(
            'pelanggaran_data' => $pelanggaran,
            'start' => 1,
        );
        $data['title'] = 'Pelanggaran';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/tbl_pelanggaran_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kelas($id)
    {
        // $this->db->where("id_user_level", 10);
        $this->db->where("kelas", "$id");
        $pelanggaran = $this->db->get('tbl_pelanggaran')->result();

        $data = array(
            'pelanggaran_data' => $pelanggaran,
            'start' => 1

        );
        $data['title'] = 'Pelanggaran';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/tbl_pelanggaran_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function siswa()
    {
        $this->db->where("username", $this->session->userdata('username'));
        $this->db->where("kelas", $this->session->userdata('id_kelas'));
        $pelanggaran = $this->db->get('tbl_pelanggaran')->result();

        $data = array(
            'pelanggaran_data' => $pelanggaran,
            'start' => 1

        );
        $data['title'] = 'Pelanggaran';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/tbl_pelanggaran_list_siswa', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->Pelanggaran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'username' => $row->username,
                'pelanggaran' => $row->pelanggaran,
                'sanksi' => $row->sanksi,
                'kelas' => $row->kelas,
                'tgl' => $row->tgl,
            );
            $data['title'] = 'Pelanggaran';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelanggaran/tbl_pelanggaran_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggaran'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Pelanggaran',
            'button' => 'Create',
            'action' => site_url('pelanggaran/create_action'),
            'id_kelas' => $this->uri->segment(3),
            'id' => set_value('id'),
            'username' => set_value('username'),
            'pelanggaran' => set_value('pelanggaran'),
            'sanksi' => set_value('sanksi'),
            'kelas' => set_value('kelas', $this->uri->segment(3)),
            'tgl' => set_value('tgl'),
        );
        $data['title'] = 'Pelanggaran';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pelanggaran/tbl_pelanggaran_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'pelanggaran' => $this->input->post('pelanggaran', TRUE),
                'sanksi' => $this->input->post('sanksi', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
            );

            $this->Pelanggaran_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('pelanggaran'));
        }
    }

    public function update($id)
    {
        $row = $this->Pelanggaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('pelanggaran/update_action'),
                'id_kelas' => $this->uri->segment(3),
                'id' => set_value('id', $row->id),
                'username' => set_value('username', $row->username),
                'pelanggaran' => set_value('pelanggaran', $row->pelanggaran),
                'sanksi' => set_value('sanksi', $row->sanksi),
                'kelas' => set_value('kelas', $row->kelas),
                'tgl' => set_value('tgl', $row->tgl),
            );
            $data['title'] = 'Pelanggaran';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pelanggaran/tbl_pelanggaran_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'username' => $this->input->post('username', TRUE),
                'pelanggaran' => $this->input->post('pelanggaran', TRUE),
                'sanksi' => $this->input->post('sanksi', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
            );

            $this->Pelanggaran_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('pelanggaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->Pelanggaran_model->get_by_id($id);

        if ($row) {
            $this->Pelanggaran_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('pelanggaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pelanggaran'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('pelanggaran', 'pelanggaran', 'trim|required');
        $this->form_validation->set_rules('sanksi', 'sanksi', 'trim|required');
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Pelanggaran.php */
/* Location: ./application/controllers/Pelanggaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-28 09:45:48 */
/* http://harviacode.com */