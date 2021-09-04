<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_pelanggaran extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pelanggaran_model');
        $this->load->library('form_validation');
    }

    public function index()
    {




        $m_pelanggaran = $this->M_pelanggaran_model->get_all();

        $data = array(
            'm_pelanggaran_data' => $m_pelanggaran,
            'start' => 1,
        );
        $data['title'] = 'Pelanggaran';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_pelanggaran/m_pelanggaran_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->M_pelanggaran_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_pelanggaran' => $row->nama_pelanggaran,
            );
            $data['title'] = 'Pelanggaran';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_pelanggaran/m_pelanggaran_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pelanggaran'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Pelanggaran',
            'button' => 'Create',
            'action' => site_url('m_pelanggaran/create_action'),
            'id' => set_value('id'),
            'nama_pelanggaran' => set_value('nama_pelanggaran'),
        );
        $data['title'] = 'Pelanggaran';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_pelanggaran/m_pelanggaran_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_pelanggaran' => $this->input->post('nama_pelanggaran', TRUE),
            );

            $this->M_pelanggaran_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('m_pelanggaran'));
        }
    }

    public function update($id)
    {
        $row = $this->M_pelanggaran_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_pelanggaran/update_action'),
                'id' => set_value('id', $row->id),
                'nama_pelanggaran' => set_value('nama_pelanggaran', $row->nama_pelanggaran),
            );
            $data['title'] = 'Pelanggaran';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_pelanggaran/m_pelanggaran_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pelanggaran'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_pelanggaran' => $this->input->post('nama_pelanggaran', TRUE),
            );

            $this->M_pelanggaran_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('m_pelanggaran'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_pelanggaran_model->get_by_id($id);

        if ($row) {
            $this->M_pelanggaran_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('m_pelanggaran'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_pelanggaran'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_pelanggaran', 'nama pelanggaran', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_pelanggaran.php */
/* Location: ./application/controllers/M_pelanggaran.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-10 13:04:16 */
/* http://harviacode.com */