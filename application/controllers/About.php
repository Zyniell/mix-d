<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * About Controller
 * Displays Mix-D store profile, mission, and contact information.
 */
class About extends MY_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['page_title'] = 'Tentang Kami';
		$this->render('about/index', $data);
	}
}
