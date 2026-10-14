<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Settings Controller
 * Admin management for store identity, contact info, and WhatsApp order destination.
 */
class Settings extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Setting_model');
	}

	/**
	 * Display store settings form
	 */
	public function index() {
		$data['page_title'] = 'Pengaturan Identitas Toko';
		$data['settings']   = $this->Setting_model->getAllSettings();

		$this->renderAdmin('admin/settings/index', $data);
	}

	/**
	 * Update store settings
	 */
	public function update() {
		$this->form_validation->set_rules('store_name', 'Nama Toko', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('store_tagline', 'Tagline Toko', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('whatsapp_number', 'Nomor WhatsApp Pemesanan', 'required|trim|numeric');
		$this->form_validation->set_rules('store_email', 'Email Toko', 'valid_email|trim');
		$this->form_validation->set_rules('store_address', 'Alamat Toko', 'trim');
		$this->form_validation->set_rules('about_text', 'Teks Tentang Kami', 'trim');

		if ($this->form_validation->run() === FALSE) {
			$data['page_title']       = 'Pengaturan Identitas Toko';
			$data['settings']         = $this->Setting_model->getAllSettings();
			$data['validation_error'] = validation_errors();

			$this->renderAdmin('admin/settings/index', $data);
			return;
		}

		$rawWa = $this->input->post('whatsapp_number', TRUE);
		// Normalize Indonesian numbers: if starts with 08..., change to 628...
		$cleanWa = preg_replace('/[^0-9]/', '', $rawWa);
		if (strpos($cleanWa, '08') === 0) {
			$cleanWa = '628' . substr($cleanWa, 2);
		}

		$settings = array(
			'store_name'      => $this->input->post('store_name', TRUE),
			'store_tagline'   => $this->input->post('store_tagline', TRUE),
			'whatsapp_number' => $cleanWa,
			'store_email'     => $this->input->post('store_email', TRUE),
			'store_address'   => $this->input->post('store_address', TRUE),
			'about_text'      => $this->input->post('about_text', TRUE)
		);

		$this->Setting_model->updateSettings($settings);
		$this->session->set_flashdata('success', 'Pengaturan identitas toko berhasil diperbarui!');
		redirect('admin/settings');
	}
}
