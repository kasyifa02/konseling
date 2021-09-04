<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelolamenu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_Model', 'menu');
    }

    public function index()
    {
        $data['title'] = 'Kelola Menu';
        $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
        $data['menu'] = $this->menu->get_all();

        $this->_rules();

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelolamenu/index', $data);
            $this->load->view('templates/footer', $data);
        } else {

            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'is_main_menu' => $this->input->post('is_main_menu'),
                'is_aktif' => $this->input->post('is_aktif'),
                'icon' => $this->input->post('icon')
            ];
            $this->menu->insert($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
				Tambah Data Berhasil
				</div>');
            redirect('kelolamenu');
        }
    }

    public function edit($id)
    {

        $row = $this->menu->get_by_id($id);

        if ($row) {

            $data = [
                'title' => 'Edit Submenu',
                'action' => site_url('kelolamenu/edit_action'),
                'id_menu' => set_value('id_menu', $row->id_menu),
                'title' => set_value('title', $row->title),
                'url' => set_value('url', $row->url),
                'icon' => set_value('icon', $row->icon),
                'is_main_menu' => set_value('is_main_menu', $row->is_main_menu),
                'is_aktif' => set_value('is_aktif', $row->is_aktif)
            ];

            $data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('kelolamenu/menu_form', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Data Tidak Ada
            </div>');
            redirect(site_url('kelolamenu'));
        }
    }

    public function edit_action()
    {
        $this->_rules();
        if ($this->form_validation->run() == false) {
            $this->edit($this->input->post('id_menu', TRUE));
        } else {

            $data = [
                'title' => $this->input->post('title'),
                'url' => $this->input->post('url'),
                'is_main_menu' => $this->input->post('is_main_menu'),
                'is_aktif' => $this->input->post('is_aktif'),
                'icon' => $this->input->post('icon')
            ];

            $this->menu->update($this->input->post('id_menu', TRUE), $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Edit Data Berhasil
            </div>');
            redirect(site_url('kelolamenu'));
        }
    }

    public function hapus($id)
    {
        $this->menu->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
            Hapus Data Berhasil
            </div>');
        redirect(site_url('kelolamenu'));
    }

    private function _rules()
    {
        $this->form_validation->set_rules('title', 'title', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');
        $this->form_validation->set_rules('is_main_menu', 'Main Menu', 'required|trim');
        $this->form_validation->set_rules('is_aktif', 'Is Aktif', 'required|trim');
    }
}
