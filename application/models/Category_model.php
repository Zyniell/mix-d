<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Category_model
 * Handles categories for men's shoes catalog.
 */
class Category_model extends CI_Model {

	protected $table = 'categories';

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get all categories
	 * @return array
	 */
	public function getAllCategories() {
		$this->db->order_by('name', 'ASC');
		return $this->db->get($this->table)->result_array();
	}

	/**
	 * Get categories with total active products count
	 * @return array
	 */
	public function getCategoriesWithProductCount() {
		$this->db->select('c.*, COUNT(p.id) AS total_products');
		$this->db->from($this->table . ' c');
		$this->db->join('products p', 'p.category_id = c.id AND p.is_active = 1', 'left');
		$this->db->group_by('c.id');
		$this->db->order_by('c.name', 'ASC');
		return $this->db->get()->result_array();
	}

	/**
	 * Get category by ID
	 *
	 * @param int $id
	 * @return array|null
	 */
	public function getCategoryById($id) {
		$this->db->where('id', (int)$id);
		return $this->db->get($this->table)->row_array();
	}

	/**
	 * Get category by Slug
	 *
	 * @param string $slug
	 * @return array|null
	 */
	public function getCategoryBySlug($slug) {
		$this->db->where('slug', $slug);
		return $this->db->get($this->table)->row_array();
	}

	/**
	 * Create category
	 *
	 * @param array $data
	 * @return int Insert ID
	 */
	public function createCategory($data) {
		$data['created_at'] = date('Y-m-d H:i:s');
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	/**
	 * Update category
	 *
	 * @param int $id
	 * @param array $data
	 * @return bool
	 */
	public function updateCategory($id, $data) {
		$data['updated_at'] = date('Y-m-d H:i:s');
		$this->db->where('id', (int)$id);
		return $this->db->update($this->table, $data);
	}

	/**
	 * Delete category
	 *
	 * @param int $id
	 * @return bool
	 */
	public function deleteCategory($id) {
		$this->db->where('id', (int)$id);
		return $this->db->delete($this->table);
	}

	/**
	 * Generate URL friendly unique slug
	 *
	 * @param string $name
	 * @param int|null $excludeId
	 * @return string
	 */
	public function generateUniqueSlug($name, $excludeId = null) {
		$slug = url_title(strtolower(trim($name)), '-', TRUE);
		if (empty($slug)) {
			$slug = 'kategori-' . time();
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
