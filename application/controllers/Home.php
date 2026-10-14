<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Home Controller
 * Mix-D Online Store Homepage.
 */
class Home extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
	}

	/**
	 * Display homepage
	 */
	public function index() {
		$data['page_title'] = 'Sepatu Pria Berkualitas & Berkarakter';
		$data['categories'] = $this->Category_model->getCategoriesWithProductCount();
		$data['featured_products'] = $this->Product_model->getFeaturedProducts(8);

		$this->render('home/index', $data);
	}
}
