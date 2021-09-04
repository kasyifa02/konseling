<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->model('Mastercrud', 'crud');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $guru = "";

        $level = $this->session->userdata('id_user_level');
        if ($level == 9) {
            $this->db->where("id_user_level", 10);
            $this->db->where("id_kelas", $this->session->userdata('id_kelas'));
            $guru = $this->db->get('tbl_user')->result();
        } elseif ($level == 2) {
            $this->db->where("id_user_level", 10);
            $guru = $this->db->get('tbl_user')->result();
        } else {
            $this->db->where("id_user_level", 10);
            $guru = $this->db->get('tbl_user')->result();
        }

        $data = array(
            'guru_data' => $guru,
            'start' => 0

        );
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tbl_user_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function kelas($id)
    {
        $this->db->where("id_user_level", 10);
        $this->db->where("id_kelas", "$id");
        $guru = $this->db->get('tbl_user')->result();

        $data = array(
            'guru_data' => $guru,
            'start' => 0

        );
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tbl_user_list', $data);
        $this->load->view('templates/footer', $data);
    }

    public function read($id, $nisn)
    {
        $row = $this->Guru_model->get_by_id($id);
        $result = $this->crud->get_by_id("tbl_siswa", "nisn", $nisn);
        if ($row) {
            $data = array(
                'id_users' => $row->id_users,
                'full_name' => $row->full_name,
                'username' => $row->username,
                'password' => $row->password,
                'images' => $row->images,
                'id_user_level' => $row->id_user_level,
                'id_kelas' => $row->id_kelas,
                'is_aktif' => $row->is_aktif,
                'tahun_ajaran' => $result->tahun_ajaran,
                'alamat' => $result->alamat,
                'email' => $result->email,
                'nama_ortu' => $result->nama_ortu,
                'no_hp' => $result->no_hp,
            );
            $data['title'] = 'Siswa';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('siswa/tbl_user_read', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Siswa'));
        }
    }

    public function create()
    {
        $data = array(
            'title' => 'Siswa',
            'button' => 'Create',
            'action' => site_url('siswa/create_action'),
            'id_users' => set_value('id_users'),
            'full_name' => set_value('full_name'),
            'username' => set_value('username'),
            'password' => set_value('password'),
            'images' => set_value('images'),
            'id_user_level' => set_value('id_user_level'),
            'id_kelas' => set_value('id_kelas'),
            'is_aktif' => set_value('is_aktif'),
            'tahun_ajaran' => set_value('tahun_ajaran', date('Y', time())),
            'alamat' => set_value('alamat'),
            'email' => set_value('email'),
            'nama_ortu' => set_value('nama_ortu'),
            'no_hp' => set_value('no_hp'),
        );
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tbl_user_form', $data);
        $this->load->view('templates/footer', $data);
    }

    public function create_action()
    {
        $this->db->where('username', $this->input->post('username', TRUE));
        $cek = $this->db->get('tbl_user')->row();
        // var_dump($cek);
        // die;
        if ($cek) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username Sudah Terdaftar!
            </div>');
            $this->create();
            return;
        }
        $this->_rules();
        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {


            $passHash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

            $logo = $_FILES['images']['name'];
            if ($logo) {
                $config['file_name']            = "img" . time();
                $config['upload_path']          = './assets/img/profile/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 2048;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('images')) {
                    $new_logo = $this->upload->data('file_name');

                    $query = [
                        'nisn' => $this->input->post('username', TRUE),
                        'nama' => $this->input->post('full_name', TRUE),
                        'kelas' => $this->input->post('id_kelas', TRUE),
                        'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                        'alamat' => $this->input->post('alamat'),
                        'email' => $this->input->post('email'),
                        'nama_ortu' => $this->input->post('nama_ortu'),
                        'no_hp' => $this->input->post('no_hp'),
                    ];
                    $this->crud->insert("tbl_siswa", $query);
                    $data = array(
                        'full_name' => $this->input->post('full_name', TRUE),
                        'username' => $this->input->post('username', TRUE),
                        'password' => $passHash,
                        'images' => $new_logo,
                        'id_user_level' => $this->input->post('id_user_level', TRUE),
                        'id_kelas' => $this->input->post('id_kelas', TRUE),
                        'is_aktif' => $this->input->post('is_aktif', TRUE),
                    );

                    $this->Guru_model->insert($data);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Tambah Data Berhasil
            </div>');
                    redirect(site_url('siswa'));
                }
            }
        }
    }

    public function update($id, $nisn)
    {
        $row = $this->Guru_model->get_by_id($id);
        $result = $this->crud->get_by_id("tbl_siswa", "nisn", $nisn);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('siswa/update_action'),
                'id_users' => set_value('id_users', $row->id_users),
                'full_name' => set_value('full_name', $row->full_name),
                'username' => set_value('username', $row->username),
                'password' => set_value('password', $row->password),
                'images' => set_value('images', $row->images),
                'id_user_level' => set_value('id_user_level', $row->id_user_level),
                'id_kelas' => set_value('id_kelas', $row->id_kelas),
                'is_aktif' => set_value('is_aktif', $row->is_aktif),
                'tahun_ajaran' => set_value('tahun_ajaran', date('Y', time())),
                'alamat' => set_value('alamat', $result->alamat),
                'email' => set_value('email', $result->email),
                'nama_ortu' => set_value('nama_ortu', $result->nama_ortu),
                'no_hp' => set_value('no_hp', $result->no_hp),
            );
            $data['title'] = 'Siswa';
            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('siswa/tbl_user_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Siswa'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_users', TRUE), $this->input->post('username', TRUE));
        } else {
            $config['file_name']            = "img" . time();
            $config['upload_path']          = './assets/img/profile/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2048;
            // $gambar = "";

            if (!empty($_FILES['images']['name'])) {
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('images')) {
                    $gambar = $this->upload->data('file_name');
                    $old_image  = $this->Guru_model->get_by_id($this->input->post('id_users'));
                    if ($old_image->images) {
                        unlink(FCPATH . '/assets/img/profile/' . $old_image->images);
                    }
                } else {
                    redirect('siswa/update');
                }
            } else {
                $img    = $this->Guru_model->get_by_id($this->input->post('id_users'));
                $gambar = $img->images;
            }

            $query = [
                'nisn' => $this->input->post('username', TRUE),
                'nama' => $this->input->post('full_name', TRUE),
                'kelas' => $this->input->post('id_kelas', TRUE),
                'tahun_ajaran' => $this->input->post('tahun_ajaran', true),
                'alamat' => $this->input->post('alamat', true),
                'email' => $this->input->post('email', true),
                'nama_ortu' => $this->input->post('nama_ortu', true),
                'no_hp' => $this->input->post('no_hp', true),
            ];

            $this->crud->update("tbl_siswa", "nisn", $this->input->post('username', TRUE), $query);

            $data = array(
                'full_name' => $this->input->post('full_name', TRUE),
                'username' => $this->input->post('username', TRUE),
                'password' => $this->input->post('password', TRUE),
                'images' => $gambar,
                'id_user_level' => $this->input->post('id_user_level', TRUE),
                'id_kelas' => $this->input->post('id_kelas', TRUE),
                'is_aktif' => $this->input->post('is_aktif', TRUE),
            );

            $this->Guru_model->update($this->input->post('id_users', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Update Data Berhasil
            </div>');
            redirect(site_url('Siswa'));
        }
    }

    public function delete($id, $nisn)
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $this->Guru_model->delete($id);
            $this->crud->delete("tbl_siswa", "nisn", $nisn);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Hapus Data Berhasil
            </div>');
            redirect(site_url('Siswa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Siswa'));
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('full_name', 'full name', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        // $this->form_validation->set_rules('images', 'images', 'trim|required');
        $this->form_validation->set_rules('id_user_level', 'id user level', 'trim|required');
        $this->form_validation->set_rules('id_kelas', 'id kelas', 'trim|required');
        $this->form_validation->set_rules('is_aktif', 'is aktif', 'trim|required');

        $this->form_validation->set_rules('id_users', 'id_users', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
}

/* End of file Guru.php */
/* Location: ./application/controllers/Guru.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-07-27 10:20:24 */
/* http://harviacode.com */