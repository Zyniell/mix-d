<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Products Controller
 * Handles customer product catalog, filters, search, and detail page with view tracking.
 */
class Products extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
	}

	/**
	 * Product catalog listing with search, category filter, and sorting
	 */
	public function index() {
		$categorySlug = $this->input->get('kategori', TRUE);
		$keyword      = $this->input->get('q', TRUE);
		$sort         = $this->input->get('sort', TRUE);

		$filters = array(
			'is_active' => 1,
			'sort'      => !empty($sort) ? $sort : 'latest'
		);

		$currentCategory = null;
		if (!empty($categorySlug)) {
			$currentCategory = $this->Category_model->getCategoryBySlug($categorySlug);
			if ($currentCategory) {
				$filters['category_id'] = $currentCategory['id'];
			}
		}

		if (!empty($keyword)) {
			$filters['keyword'] = $keyword;
		}

		// Pagination parameters
		$limit = 12;
		$page  = max(1, (int)$this->input->get('page', TRUE));
		$offset = ($page - 1) * $limit;

		$totalProducts = $this->Product_model->countProducts($filters);
		$products      = $this->Product_model->getProducts($filters, $limit, $offset);
		$categories    = $this->Category_model->getCategoriesWithProductCount();

		$data = array(
			'page_title'       => $currentCategory ? 'Koleksi ' . $currentCategory['name'] : 'Katalog Sepatu Pria',
			'products'         => $products,
			'categories'       => $categories,
			'current_category' => $currentCategory,
			'keyword'          => $keyword,
			'sort'             => $sort,
			'total_products'   => $totalProducts,
			'current_page'     => $page,
			'total_pages'      => ceil($totalProducts / $limit),
			'limit'            => $limit
		);

		$this->render('products/index', $data);
	}

	/**
	 * Single product detail page
	 *
	 * @param string $slug
	 */
	public function detail($slug = '') {
		if (empty($slug)) {
			show_404();
		}

		$product = $this->Product_model->getProductBySlug($slug);
		if (!$product) {
			show_404();
		}

		// Increment view count for dashboard analytics
		$this->Product_model->incrementViews($product['id']);

		// Parse available sizes
		$rawSizes = !empty($product['available_sizes']) ? explode(',', $product['available_sizes']) : array();
		$sizes = array();
		foreach ($rawSizes as $s) {
			$s = trim($s);
			if (!empty($s)) {
				$sizes[] = $s;
			}
		}

		// Related products
		$relatedProducts = $this->Product_model->getRelatedProducts($product['category_id'], $product['id'], 4);

		$data = array(
			'page_title'       => $product['name'],
			'product'          => $product,
			'sizes'            => $sizes,
			'related_products' => $relatedProducts
		);

		$this->render('products/detail', $data);
	}
}
