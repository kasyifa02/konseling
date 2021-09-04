<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_sanksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_sanksi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $m_sanksi = $this->M_sanksi_model->get_all();

        $data = array(
            'm_sanksi_data' => $m_sanksi,
            'start' => 1,
        );
        $data['title'] = 'Sanksi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_sanksi/m_sanksi_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->M_sanksi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_sanksi' => $row->nama_sanksi,
            );
            $data['title'] = 'Sanksi';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_sanksi/m_sanksi_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_sanksi'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Sanksi',
            'button' => 'Create',
            'action' => site_url('m_sanksi/create_action'),
            'id' => set_value('id'),
            'nama_sanksi' => set_value('nama_sanksi'),
        );
        $data['title'] = 'Sanksi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_sanksi/m_sanksi_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_sanksi' => $this->input->post('nama_sanksi', TRUE),
            );

            $this->M_sanksi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('m_sanksi'));
        }
    }

    public function update($id)
    {
        $row = $this->M_sanksi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_sanksi/update_action'),
                'id' => set_value('id', $row->id),
                'nama_sanksi' => set_value('nama_sanksi', $row->nama_sanksi),
            );
            $data['title'] = 'Sanksi';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_sanksi/m_sanksi_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_sanksi'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_sanksi' => $this->input->post('nama_sanksi', TRUE),
            );

            $this->M_sanksi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('m_sanksi'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_sanksi_model->get_by_id($id);

        if ($row) {
            $this->M_sanksi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('m_sanksi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_sanksi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_sanksi', 'nama sanksi', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_sanksi.php */
/* Location: ./application/controllers/M_sanksi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-10 13:04:46 */
/* http://harviacode.com */