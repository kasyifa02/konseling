<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class M_penghargaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_penghargaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $m_penghargaan = $this->M_penghargaan_model->get_all();

        $data = array(
            'm_penghargaan_data' => $m_penghargaan,
            'start' => 1,
        );
        $data['title'] = 'Penghargaan';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_penghargaan/m_penghargaan_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->M_penghargaan_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'nama_penghargaan' => $row->nama_penghargaan,
            );
            $data['title'] = 'Penghargaan';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_penghargaan/m_penghargaan_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_penghargaan'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Penghargaan',
            'button' => 'Create',
            'action' => site_url('m_penghargaan/create_action'),
            'id' => set_value('id'),
            'nama_penghargaan' => set_value('nama_penghargaan'),
        );
        $data['title'] = 'Penghargaan';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('m_penghargaan/m_penghargaan_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama_penghargaan' => $this->input->post('nama_penghargaan', TRUE),
            );

            $this->M_penghargaan_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('m_penghargaan'));
        }
    }

    public function update($id)
    {
        $row = $this->M_penghargaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('m_penghargaan/update_action'),
                'id' => set_value('id', $row->id),
                'nama_penghargaan' => set_value('nama_penghargaan', $row->nama_penghargaan),
            );
            $data['title'] = 'Penghargaan';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('m_penghargaan/m_penghargaan_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_penghargaan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'nama_penghargaan' => $this->input->post('nama_penghargaan', TRUE),
            );

            $this->M_penghargaan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('m_penghargaan'));
        }
    }

    public function delete($id)
    {
        $row = $this->M_penghargaan_model->get_by_id($id);

        if ($row) {
            $this->M_penghargaan_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('m_penghargaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('m_penghargaan'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_penghargaan', 'nama penghargaan', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file M_penghargaan.php */
/* Location: ./application/controllers/M_penghargaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-08-10 13:04:27 */
/* http://harviacode.com */