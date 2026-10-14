<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Product_model
 * Handles men's shoe catalog queries, stock, sizes, and view counts.
 */
class Product_model extends CI_Model {

	protected $table = 'products';

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Build base query with category join and filters
	 *
	 * @param array $filters
	 */
	private function applyFilters($filters = array()) {
		if (!empty($filters['category_id'])) {
			$this->db->where('p.category_id', (int)$filters['category_id']);
		}

		if (!empty($filters['category_slug'])) {
			$this->db->where('c.slug', $filters['category_slug']);
		}

		if (!empty($filters['keyword'])) {
			$keyword = trim($filters['keyword']);
			$this->db->group_start();
			$this->db->like('p.name', $keyword);
			$this->db->or_like('p.description', $keyword);
			$this->db->group_end();
		}

		if (isset($filters['is_active'])) {
			$this->db->where('p.is_active', (int)$filters['is_active']);
		}
	}

	/**
	 * Get products with optional pagination and filters
	 *
	 * @param array $filters
	 * @param int|null $limit
	 * @param int|null $offset
	 * @return array
	 */
	public function getProducts($filters = array(), $limit = null, $offset = null) {
		$this->db->select('p.*, c.name AS category_name, c.slug AS category_slug');
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');

		$this->applyFilters($filters);

		// Sorting options
		$sort = isset($filters['sort']) ? $filters['sort'] : 'latest';
		switch ($sort) {
			case 'price_asc':
				$this->db->order_by('p.price', 'ASC');
				break;
			case 'price_desc':
				$this->db->order_by('p.price', 'DESC');
				break;
			case 'popular':
				$this->db->order_by('p.views', 'DESC');
				break;
			case 'name_asc':
				$this->db->order_by('p.name', 'ASC');
				break;
			case 'latest':
			default:
				$this->db->order_by('p.id', 'DESC');
				break;
		}

		if ($limit !== null) {
			$this->db->limit((int)$limit, (int)$offset);
		}

		return $this->db->get()->result_array();
	}

	/**
	 * Count products matching filters
	 *
	 * @param array $filters
	 * @return int
	 */
	public function countProducts($filters = array()) {
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');
		$this->applyFilters($filters);
		return $this->db->count_all_results();
	}

	/**
	 * Get single product by ID
	 *
	 * @param int $id
	 * @return array|null
	 */
	public function getProductById($id) {
		$this->db->select('p.*, c.name AS category_name, c.slug AS category_slug');
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');
		$this->db->where('p.id', (int)$id);
		return $this->db->get()->row_array();
	}

	/**
	 * Get single active product by slug
	 *
	 * @param string $slug
	 * @param bool $activeOnly
	 * @return array|null
	 */
	public function getProductBySlug($slug, $activeOnly = TRUE) {
		$this->db->select('p.*, c.name AS category_name, c.slug AS category_slug');
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');
		$this->db->where('p.slug', $slug);

		if ($activeOnly) {
			$this->db->where('p.is_active', 1);
		}

		return $this->db->get()->row_array();
	}

	/**
	 * Get featured products for homepage
	 *
	 * @param int $limit
	 * @return array
	 */
	public function getFeaturedProducts($limit = 6) {
		return $this->getProducts(array(
			'is_active' => 1,
			'sort' => 'popular'
		), $limit);
	}

	/**
	 * Get related products by category
	 *
	 * @param int $categoryId
	 * @param int|null $excludeId
	 * @param int $limit
	 * @return array
	 */
	public function getRelatedProducts($categoryId, $excludeId = null, $limit = 4) {
		$this->db->select('p.*, c.name AS category_name, c.slug AS category_slug');
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');
		$this->db->where('p.is_active', 1);

		if (!empty($categoryId)) {
			$this->db->where('p.category_id', (int)$categoryId);
		}

		if (!empty($excludeId)) {
			$this->db->where('p.id !=', (int)$excludeId);
		}

		$this->db->order_by('p.views', 'DESC');
		$this->db->limit((int)$limit);

		return $this->db->get()->result_array();
	}

	/**
	 * Get top most viewed products for admin dashboard
	 *
	 * @param int $limit
	 * @return array
	 */
	public function getTopViewedProducts($limit = 5) {
		$this->db->select('p.*, c.name AS category_name');
		$this->db->from($this->table . ' p');
		$this->db->join('categories c', 'c.id = p.category_id', 'left');
		$this->db->order_by('p.views', 'DESC');
		$this->db->limit((int)$limit);
		return $this->db->get()->result_array();
	}

	/**
	 * Increment product view count
	 *
	 * @param int $id
	 * @return bool
	 */
	public function incrementViews($id) {
		$this->db->set('views', 'views + 1', FALSE);
		$this->db->where('id', (int)$id);
		return $this->db->update($this->table);
	}

	/**
	 * Insert new product
	 *
	 * @param array $data
	 * @return int Insert ID
	 */
	public function createProduct($data) {
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * Update product
	 *
	 * @param int $id
	 * @param array $data
	 * @return bool
	 */
	public function updateProduct($id, $data) {
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', (int)$id);
		return $this->db->update($this->table, $data);
	}

	/**
	 * Delete product
	 *
	 * @param int $id
	 * @return bool
	 */
	public function deleteProduct($id) {
		$this->db->where('id', (int)$id);
		return $this->db->delete($this->table);
	}

	/**
	 * Generate unique slug for products
	 *
	 * @param string $name
	 * @param int|null $excludeId
	 * @return string
	 */
	public function generateUniqueSlug($name, $excludeId = null) {
		$slug = url_title(strtolower(trim($name)), '-', TRUE);
		if (empty($slug)) {
			$slug = 'sepatu-' . time();
		}

		$originalSlug = $slug;
		$counter = 1;

		while (TRUE) {
			$this->db->where('slug', $slug);
			if (!empty($excludeId)) {
				$this->db->where('id !=', (int)$excludeId);
			}
			$count = $this->db->count_all_results($this->table);

			if ($count === 0) {
				break;
			}

			$slug = $originalSlug . '-' . $counter;
			$counter++;
		}

		return $slug;
	}
}
