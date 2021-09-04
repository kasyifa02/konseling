<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_Model');
		$this->load->library('form_validation');
		$this->load->library('session');
	}

	public function index()
	{
		if ($this->session->userdata('username')) {
			redirect(base_url('user'));
		}
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == false) {
			$this->load->view('templates/auth_header');
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('password');

		$user = $this->Auth_Model->get_where('username', $username);

		if ($user['username'] == $username) {
			if ($user['is_aktif'] == 'y') {
				if (password_verify($pass, $user['password'])) {
					$this->db->where('username', $user['username']);
					$datas = $this->db->get('tbl_user')->row();

					foreach ($datas as $key => $value) {
						$this->session->set_userdata($key, $value);
					}
					// cek level user
					if ($user['id_user_level'] == 1 or $user['id_user_level'] == 3) {
						redirect('dashboard');
					} else {
						redirect('user');
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">
				sandi anda salah!
				</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">
				akun anda belum aktif
				</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">
			username tidak ditemukan
			</div>');
			redirect('auth');
		}
	}

	public function registrasi()
	{
		if ($this->session->userdata('username')) {
			redirect(base_url('user'));
		}
		$data = [
			'action' => site_url('auth/registrasi_action'),
			'full_name' => set_value('full_name'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'no_telp' => set_value('no_telp')

		];
		$this->load->view('templates/auth_header');
		$this->load->view('auth/registrasi', $data);
		$this->load->view('templates/auth_footer');
	}


	public function registrasi_action()
	{
		$this->_rules();

		if ($this->form_validation->run() == false) {
			$this->registrasi();
		} else {

			$passHash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data = [
				'full_name' => $this->input->post('full_name', True),
				'username' => $this->input->post('username', True),
				'password' => $passHash,
				'is_aktif' => 'y',
				'id_user_level' => '2',
				'image' => 'default.png',
				'no_telp' => $this->input->post('no_telp')
			];


			$this->Auth_Model->insert($data);
			$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
			yeay berhasil
			</div>');
			redirect(site_url('auth'));
		}
	}


	private function _rules()
	{
		$this->form_validation->set_rules('full_name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]', ['min_lenght' => 'password sangat lemah']);
		$this->form_validation->set_rules('passconf', 'Password Confirmasi', 'required|matches[password]', [
			'matches' => 'password not matches',

		]);
		$this->form_validation->set_rules('no_telp', 'No Telpon', 'trim|required|max_lenght[13]');
	}

	public function bloked()
	{
		$this->load->view('auth/bloked');
	}

	public function logout()
	{
		// session_start();
		// session_destroy();
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_user_level');

		$this->session->set_flashdata('message', '<div class="alert alert-success role="alert">
			anda berhasil keluar
			</div>');
		redirect(site_url('auth'));
	}
}
