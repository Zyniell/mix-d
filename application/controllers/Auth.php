<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Auth Controller
 * Handles Admin login, rate limiting, session authentication, and logout.
 */
class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model');
	}

	/**
	 * Admin login page & process
	 */
	public function login() {
		// If already authenticated, redirect to dashboard
		if ($this->session->userdata('admin_logged_in')) {
			redirect('admin/dashboard');
		}

		if ($this->input->method() === 'post') {
			$ip = $this->input->ip_address();

			// Rate limit check: max 5 failed attempts in 15 minutes
			if (!$this->User_model->checkRateLimit($ip, 5, 15)) {
				$this->session->set_flashdata('error', 'Terlalu banyak percobaan login gagal dari IP Anda. Mohon tunggu 15 menit sebelum mencoba kembali.');
				redirect('admin/login');
				return;
			}

			$this->form_validation->set_rules('username', 'Username / Email', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');

			if ($this->form_validation->run() === TRUE) {
				$identifier = $this->input->post('username', TRUE);
				$password   = $this->input->post('password');

				$user = $this->User_model->getByUsernameOrEmail($identifier);

				if ($user && $this->User_model->verifyPassword($password, $user['password'])) {
					// Clear failed attempts
					$this->User_model->clearFailedAttempts($ip);

					// Set session
					$sessionData = array(
						'admin_logged_in' => TRUE,
						'admin_id'        => (int)$user['id'],
						'admin_username'  => $user['username'],
						'admin_name'      => $user['name'],
						'admin_email'     => $user['email']
					);
					$this->session->set_userdata($sessionData);

					$this->session->set_flashdata('success', 'Selamat datang kembali, ' . html_escape($user['name']) . '!');
					redirect('admin/dashboard');
					return;
				} else {
					$this->User_model->recordFailedAttempt($ip);
					$this->session->set_flashdata('error', 'Username atau Password salah.');
					redirect('admin/login');
					return;
				}
			}
		}

		$data['page_title'] = 'Login Admin Mix-D';
		$this->load->view('auth/login', $data);
	}

	/**
	 * Admin logout
	 */
	public function logout() {
		$this->session->unset_userdata(array('admin_logged_in', 'admin_id', 'admin_username', 'admin_name', 'admin_email'));
		$this->session->set_flashdata('success', 'Anda telah berhasil keluar (logout).');
		redirect('admin/login');
	}
}
