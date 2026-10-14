<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Controller
 * Base controller for public and shared Mix-D features.
 */
class MY_Controller extends CI_Controller {

	/**
	 * Shared data passed to views
	 * @var array
	 */
	protected $data = array();

	/**
	 * Key-value array of store settings
	 * @var array
	 */
	protected $store_settings = array();

	public function __construct() {
		parent::__construct();

		// Load core models and libraries
		$this->load->model('Setting_model');
		$this->load->model('Visitor_model');
		$this->load->library('Cart_service');

		// Fetch and store store settings globally
		$this->store_settings = $this->Setting_model->getAllSettings();
		$this->data['store_settings'] = $this->store_settings;

		// Cart item count badge
		$this->data['cart_count'] = $this->cart_service->totalItems();

		// Track visitor on GET public requests
		$this->trackVisitor();
	}

	/**
	 * Log visitor activity on non-ajax, non-admin GET requests
	 */
	private function trackVisitor() {
		if ($this->input->is_ajax_request()) {
			return;
		}

		$uri = $this->uri->uri_string();
		// Skip tracking for admin and auth pages
		if (strpos($uri, 'admin') === 0 || strpos($uri, 'auth') === 0 || strpos($uri, 'login') === 0) {
			return;
		}

		$ip = $this->input->ip_address();
		$userAgent = substr($this->input->user_agent(), 0, 250);
		$pageUrl = '/' . ltrim($uri, '/');

		$this->Visitor_model->logVisit($ip, $userAgent, $pageUrl);
	}

	/**
	 * Helper to render customer view with layout
	 *
	 * @param string $viewPath
	 * @param array $viewData
	 */
	protected function render($viewPath, $viewData = array()) {
		$mergedData = array_merge($this->data, $viewData);
		$this->load->view('layouts/header', $mergedData);
		$this->load->view($viewPath, $mergedData);
		$this->load->view('layouts/footer', $mergedData);
	}
}

/**
 * Admin_Controller
 * Base controller protecting all admin routes.
 */
class Admin_Controller extends MY_Controller {

	public function __construct() {
		parent::__construct();

		// Verify admin authentication
		if (!$this->session->userdata('admin_logged_in')) {
			$this->session->set_flashdata('error', 'Silakan login terlebih dahulu untuk mengakses panel admin.');
			redirect('admin/login');
		}

		$this->data['admin_name'] = $this->session->userdata('admin_name');
		$this->data['admin_username'] = $this->session->userdata('admin_username');
		$this->data['admin_email'] = $this->session->userdata('admin_email');
	}

	/**
	 * Helper to render admin view with admin layout
	 *
	 * @param string $viewPath
	 * @param array $viewData
	 */
	protected function renderAdmin($viewPath, $viewData = array()) {
		$mergedData = array_merge($this->data, $viewData);
		$this->load->view('admin/layouts/header', $mergedData);
		$this->load->view($viewPath, $mergedData);
		$this->load->view('admin/layouts/footer', $mergedData);
	}
}
