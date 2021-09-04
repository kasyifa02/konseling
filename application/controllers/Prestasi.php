<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Prestasi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Prestasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $prestasi = $this->Prestasi_model->get_all();



        $data = array(
            'prestasi_data' => $prestasi,
            'start' => 1,
        );
        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prestasi/tbl_prestasi_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kelas($id)
    {
        // $this->db->where("id_user_level", 10);
        $this->db->where("kelas", "$id");
        $prestasi = $this->db->get('tbl_prestasi')->result();

        $data = array(
            'prestasi_data' => $prestasi,
            'start' => 1

        );
        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prestasi/tbl_prestasi_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->Prestasi_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'username' => $row->username,
                'prestasi' => $row->prestasi,
                'kelas' => $row->kelas,
                'tgl' => $row->tgl,
            );
            $data['title'] = 'Prestasi';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('prestasi/tbl_prestasi_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prestasi'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Prestasi',
            'button' => 'Create',
            'action' => site_url('prestasi/create_action'),
            'id' => set_value('id'),
            'id_kelas' => $this->uri->segment(3),
            'username' => set_value('username'),
            'prestasi' => set_value('prestasi'),
            'penghargaan' => set_value('penghargaan'),
            'kelas' => set_value('kelas', $this->uri->segment(3)),
            'tgl' => set_value('tgl'),
        );
        $data['title'] = 'Prestasi';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('prestasi/tbl_prestasi_form', $data);
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
                'prestasi' => $this->input->post('prestasi', TRUE),
                'penghargaan' => $this->input->post('penghargaan', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
            );

            $this->Prestasi_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('prestasi'));
        }
    }

    public function update($id)
    {
        $row = $this->Prestasi_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('prestasi/update_action'),
                'id_kelas' => $this->uri->segment(3),
                'id' => set_value('id', $row->id),
                'username' => set_value('username', $row->username),
                'prestasi' => set_value('prestasi', $row->prestasi),
                'penghargaan' => set_value('penghargaan', $row->penghargaan),
                'kelas' => set_value('kelas', $row->kelas),
                'tgl' => set_value('tgl', $row->tgl),
            );
            $data['title'] = 'Prestasi';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('prestasi/tbl_prestasi_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prestasi'));
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
                'prestasi' => $this->input->post('prestasi', TRUE),
                'penghargaan' => $this->input->post('penghargaan', TRUE),
                'kelas' => $this->input->post('kelas', TRUE),
                'tgl' => $this->input->post('tgl', TRUE),
            );

            $this->Prestasi_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('prestasi'));
        }
    }

    public function delete($id)
    {
        $row = $this->Prestasi_model->get_by_id($id);

        if ($row) {
            $this->Prestasi_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('prestasi'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('prestasi'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('prestasi', 'prestasi', 'trim|required');
        $this->form_validation->set_rules('penghargaan', 'penghargaan', 'trim|required');
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');
        $this->form_validation->set_rules('tgl', 'tgl', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Prestasi.php */
/* Location: ./application/controllers/Prestasi.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-28 09:45:33 */
/* http://harviacode.com */