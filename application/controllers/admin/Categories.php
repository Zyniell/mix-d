<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Categories Controller
 * Admin management for men's shoes categories.
 */
class Categories extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Category_model');
	}

	/**
	 * List all categories with product counts
	 */
	public function index() {
		$data['page_title'] = 'Kelola Kategori Sepatu';
		$data['categories'] = $this->Category_model->getCategoriesWithProductCount();

		$this->renderAdmin('admin/categories/index', $data);
	}

	/**
	 * Form to add a new category
	 */
	public function create() {
		$data['page_title'] = 'Tambah Kategori Baru';
		$data['category']   = null;

		$this->renderAdmin('admin/categories/form', $data);
	}

	/**
	 * Store newly created category
	 */
	public function store() {
		$this->form_validation->set_rules('name', 'Nama Kategori', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('description', 'Deskripsi Kategori', 'trim|max_length[500]');

		if ($this->form_validation->run() === FALSE) {
			$data['page_title']       = 'Tambah Kategori Baru';
			$data['category']         = null;
			$data['validation_error'] = validation_errors();

			$this->renderAdmin('admin/categories/form', $data);
			return;
		}

		$name        = $this->input->post('name', TRUE);
		$description = $this->input->post('description', TRUE);
		$slug        = $this->Category_model->generateUniqueSlug($name);

		$insertData = array(
			'name'        => $name,
			'slug'        => $slug,
			'description' => $description
		);

		$this->Category_model->createCategory($insertData);
		$this->session->set_flashdata('success', 'Kategori "' . html_escape($name) . '" berhasil ditambahkan.');
		redirect('admin/categories');
	}

	/**
	 * Form to edit existing category
	 *
	 * @param int $id
	 */
	public function edit($id = 0) {
		$category = $this->Category_model->getCategoryById($id);
		if (!$category) {
			$this->session->set_flashdata('error', 'Kategori tidak ditemukan.');
			redirect('admin/categories');
		}

		$data['page_title'] = 'Edit Kategori: ' . $category['name'];
		$data['category']   = $category;

		$this->renderAdmin('admin/categories/form', $data);
	}

	/**
	 * Update category
	 *
	 * @param int $id
	 */
	public function update($id = 0) {
		$category = $this->Category_model->getCategoryById($id);
		if (!$category) {
			$this->session->set_flashdata('error', 'Kategori tidak ditemukan.');
			redirect('admin/categories');
		}

		$this->form_validation->set_rules('name', 'Nama Kategori', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('description', 'Deskripsi Kategori', 'trim|max_length[500]');

		if ($this->form_validation->run() === FALSE) {
			$data['page_title']       = 'Edit Kategori: ' . $category['name'];
			$data['category']         = $category;
			$data['validation_error'] = validation_errors();

			$this->renderAdmin('admin/categories/form', $data);
			return;
		}

		$name        = $this->input->post('name', TRUE);
		$description = $this->input->post('description', TRUE);
		$slug        = $this->Category_model->generateUniqueSlug($name, $id);

		$updateData = array(
			'name'        => $name,
			'slug'        => $slug,
			'description' => $description
		);

		$this->Category_model->updateCategory($id, $updateData);
		$this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
		redirect('admin/categories');
	}

	/**
	 * Delete category
	 *
	 * @param int $id
	 */
	public function delete($id = 0) {
		$category = $this->Category_model->getCategoryById($id);
		if ($category) {
			$this->Category_model->deleteCategory($id);
			$this->session->set_flashdata('success', 'Kategori "' . html_escape($category['name']) . '" berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Kategori tidak ditemukan.');
		}

		redirect('admin/categories');
	}
}
