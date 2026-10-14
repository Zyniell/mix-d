<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Dashboard Controller
 * Admin Dashboard displaying visitor analytics, shoe catalog overview, and top-viewed products.
 */
class Dashboard extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->model('Visitor_model');
	}

	/**
	 * Display dashboard summary
	 */
	public function index() {
		$data['page_title'] = 'Dashboard Analitik & Ringkasan';

		// Metric counts
		$data['total_products']    = $this->Product_model->countProducts();
		$data['total_categories']  = count($this->Category_model->getAllCategories());
		$data['today_visitors']    = $this->Visitor_model->getTodayVisitors();
		$data['total_visitors']    = $this->Visitor_model->getTotalVisitors();

		// Top viewed shoes (requirement: produk yang paling sering dilihat)
		$data['top_viewed_shoes']  = $this->Product_model->getTopViewedProducts(6);

		// Visitor trends (last 7 days)
		$data['visitor_stats_7d']  = $this->Visitor_model->getDailyStats(7);

		// Recent products
		$data['recent_products']   = $this->Product_model->getProducts(array(), 5, 0);

		$this->renderAdmin('admin/dashboard/index', $data);
	}
}
