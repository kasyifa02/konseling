<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_prestasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_prestasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $m_prestasi = $this->M_prestasi_model->get_all();
        $data = array(
            'm_prestasi_data' => $m_prestasi,
            'start' => 1,
        );
        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_prestasi/m_prestasi_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->M_prestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_prestasi' => $row->nama_prestasi,
            );
            $data['title'] = 'Prestasi';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_prestasi/m_prestasi_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_prestasi'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Prestasi',
            'button' => 'Create',
            'action' => site_url('m_prestasi/create_action'),
            'id' => set_value('id'),
            'nama_prestasi' => set_value('nama_prestasi'),
        );
        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_prestasi/m_prestasi_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_prestasi' => $this->input->post('nama_prestasi', TRUE),
            );

            $this->M_prestasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('m_prestasi'));
        }
    }

    public function update($id)
    {
        $row = $this->M_prestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_prestasi/update_action'),
                'id' => set_value('id', $row->id),
                'nama_prestasi' => set_value('nama_prestasi', $row->nama_prestasi),
            );
            $data['title'] = 'Prestasi';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_prestasi/m_prestasi_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_prestasi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_prestasi' => $this->input->post('nama_prestasi', TRUE),
            );

            $this->M_prestasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('m_prestasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_prestasi_model->get_by_id($id);

        if ($row) {
            $this->M_prestasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('m_prestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_prestasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_prestasi', 'nama prestasi', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_prestasi.php */
/* Location: ./application/controllers/M_prestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-10 13:04:34 */
/* http://harviacode.com */