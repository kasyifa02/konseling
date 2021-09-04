<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Auth_Model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function index()
    {
        $data['title'] = 'User Profile';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer', $data);
    }

    public function changepassword()
    {
        $data['title'] = 'Edit Password';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('password_sekarang', 'password_sekarang', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[3]', ['min_lenght' => 'password sangat lemah']);
        $this->form_validation->set_rules('password2', 'Password Confirmasi', 'required|matches[password]', [
            'matches' => 'password not matches',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $username = $this->session->userdata('username');
            $id = $this->session->userdata('id_users');
            $passNow = $this->input->post('password_sekarang');
            $pass = $this->input->post('password');

            $user = $this->Auth_Model->get_where('username', $username);

            if ($user['username'] == $username) {
                if ($user['is_aktif'] == 'y') {
                    if (password_verify($passNow, $user['password'])) {
                        $row = $this->Auth_Model->get_by_id($id);
                        $passHash = password_hash($pass, PASSWORD_DEFAULT);
                        $data = array(
                            'full_name' => $row->full_name,
                            'username' => $row->username,
                            'password' => $passHash,
                            'images' => $row->images,
                            'id_user_level' => $row->id_user_level,
                            'id_kelas' => $row->id_kelas,
                            'is_aktif' => $row->is_aktif,
                        );

                        $this->Auth_Model->update($id, $data);
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        Ganti Password Berhasil
                        </div>');
                        redirect(site_url('user/changepassword'));
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password Salah!
                        </div>');
                        redirect(site_url('user/changepassword'));
                    }
                }
            }
        }
    }
}
