<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelolapengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('Kelolapengguna_Model', 'pengguna');
	}

	public function index()
	{
		$data['title'] = 'Kelola Pengguna';
		$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();
		$data['kelola_pengguna'] = $this->pengguna->get_all();

		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kelolapengguna/index', $data);
			$this->load->view('templates/footer', $data);
		} else {
			$passHash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data = [
				'full_name' => $this->input->post('full_name', True),
				'username' => $this->input->post('username', True),
				'password' => $passHash,
				'is_aktif' => $this->input->post('is_aktif', True),
				'id_user_level' => '2',
				'image' => 'default.png',
				'no_telp' => $this->input->post('no_telp')
			];

			$this->pengguna->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
			yeay berhasil
			</div>');
			redirect(site_url('kelolapengguna'));
		}
	}

	public function edit($id)
	{

		$row = $this->pengguna->get_by_id($id);
		if ($row) {

			$data = [
				'title' => 'Kelola Pengguna',
				'action' => site_url('kelolapengguna/edit_action'),
				'id_users' => set_value('id_users', $row->id_users),
				'full_name' => set_value('full_name', $row->full_name),
				'username' => set_value('username', $row->email),
				'id_user_level' => set_value('id_user_level', $row->id_user_level),
				'no_telp' => set_value('no_telp', $row->no_telp),
				'is_aktif' => set_value('is_aktif', $row->is_aktif)
			];
			$data['user'] = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('templates/header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('kelolapengguna/pengguna_form', $data);
			$this->load->view('templates/footer', $data);
		} else {

			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
	Data Tidak Ada
	</div>');
			redirect(site_url('kelolapengguna'));
		}
	}


	public function edit_action()
	{
		$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_message('is_aktif', 'Is Aktif', 'riquired');

		if ($this->form_validation->run() == false) {
			$this->edit($this->input->post('id_users'));
		} else {
			$id = $this->input->post('id_users');
			$row = $this->pengguna->get_by_id($id);

			$data = [
				'full_name' => $this->input->post('full_name', True),
				'username' => $row->email,
				'password' => $row->password,
				'is_aktif' =>  $this->input->post('is_aktif', true),
				'id_user_level' =>   $this->input->post('id_user_level', true),
				'image' => $row->image,
				'no_telp' => $this->input->post('no_telp')
			];
			$this->pengguna->update($id, $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
			yeay berhasil
			</div>');
			redirect(site_url('kelolapengguna'));
		}
	}


	private function _rules()
	{
		$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required|valid_email|is_unique[tbl_user.email]', [
			'is_unique' => 'email is already registred!'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]', ['min_lenght' => 'password sangat lemah']);
		$this->form_validation->set_rules('passconf', 'Password Confirmasi', 'required|matches[password]', [
			'matches' => 'password not matches',

		]);
		$this->form_validation->set_message('no_telp', 'No Telpon', 'trim|required|max_lenght[13]');
	}
}
