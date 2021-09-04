<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Konseling extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Konseling_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $konseling = $this->Konseling_model->get_all();
        $users = "";
        $level = $this->session->userdata('id_user_level');
        if ($level == 2 or $level == 1) {
            $this->db->where('id_user_level', 10);
            $users = $this->db->get('tbl_user')->result();
        } else {
            $this->db->where('id_user_level', 2);
            $users = $this->db->get('tbl_user')->result();
        }
        $data = array(
            'konseling_data' => $konseling,
            'start' => 1,
            'users_data' => $users
        );
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/messages_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function chat($id)
    {
        $username = $this->session->userdata('username');
        $level = $this->session->userdata('id_user_level');

        $konseling = $this->db->query("SELECT * FROM `messages` WHERE `name`=$username and `ke` = $id or name =$id and `ke` = $username")->result();

        $users = "";
        $level = $this->session->userdata('id_user_level');
        if ($level == 2 or $level == 1) {
            $this->db->where('id_user_level', 10);
            $users = $this->db->get('tbl_user')->result();
        } else {
            $this->db->where('id_user_level', 2);
            $users = $this->db->get('tbl_user')->result();
        }
        $data = array(
            'konseling_data' => $konseling,
            // 'konseling_data_ke' => $konseling_ke,
            'start' => 1,
            'users_data' => $users
        );
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/messages_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id)
    {
        $row = $this->Konseling_model->get_by_id($id);
        if ($row) {
            $data = array(
                'id' => $row->id,
                'name' => $row->name,
                'ke' => $row->ke,
                'avatar' => $row->avatar,
                'message' => $row->message,
                'tipe' => $row->tipe,
                'date' => $row->date,
            );
            $data['title'] = 'Konseling';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('konseling/messages_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konseling'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Konseling',
            'button' => 'Create',
            'action' => site_url('konseling/create_action'),
            'id' => set_value('id'),
            'name' => set_value('name'),
            'ke' => set_value('ke'),
            'avatar' => set_value('avatar'),
            'message' => set_value('message'),
            'tipe' => set_value('tipe'),
            'date' => set_value('date'),
        );
        $data['title'] = 'Konseling';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('konseling/messages_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'ke' => $this->input->post('ke', TRUE),
                'avatar' => $this->input->post('avatar', TRUE),
                'message' => $this->input->post('message', TRUE),
                'tipe' => $this->input->post('tipe', TRUE),
                'date' => $this->input->post('date', TRUE),
            );

            $this->Konseling_model->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
            redirect(site_url('konseling'));
        }
    }

    public function send_message()
    {
        $message = $this->input->post('message');
        $name = $this->input->post('name');
        $ke = $this->input->post('ke');
        $data = array(
            'name' => $name,
            'ke' => $ke,
            'avatar' => "",
            'message' => $message,
            'tipe' => "",
            'date' => time(),
        );

        $this->Konseling_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Kirim Pesan Berhasil
            </div>');
        redirect(site_url('konseling'));
    }

    public function update($id)
    {
        $row = $this->Konseling_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('konseling/update_action'),
                'id' => set_value('id', $row->id),
                'name' => set_value('name', $row->name),
                'ke' => set_value('ke', $row->ke),
                'avatar' => set_value('avatar', $row->avatar),
                'message' => set_value('message', $row->message),
                'tipe' => set_value('tipe', $row->tipe),
                'date' => set_value('date', $row->date),
            );
            $data['title'] = 'Konseling';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('konseling/messages_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konseling'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
                'name' => $this->input->post('name', TRUE),
                'ke' => $this->input->post('ke', TRUE),
                'avatar' => $this->input->post('avatar', TRUE),
                'message' => $this->input->post('message', TRUE),
                'tipe' => $this->input->post('tipe', TRUE),
                'date' => $this->input->post('date', TRUE),
            );

            $this->Konseling_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('konseling'));
        }
    }

    public function delete($id)
    {
        $row = $this->Konseling_model->get_by_id($id);

        if ($row) {
            $this->Konseling_model->delete($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('konseling'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('konseling'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('ke', 'ke', 'trim|required');
        $this->form_validation->set_rules('avatar', 'avatar', 'trim|required');
        $this->form_validation->set_rules('message', 'message', 'trim|required');
        $this->form_validation->set_rules('tipe', 'tipe', 'trim|required');
        $this->form_validation->set_rules('date', 'date', 'trim|required');

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Konseling.php */
/* Location: ./application/controllers/Konseling.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-28 18:27:44 */
/* http://harviacode.com */