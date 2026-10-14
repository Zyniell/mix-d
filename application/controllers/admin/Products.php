<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Products Controller
 * Admin management for men's shoe catalog, image uploads, and size variants.
 */
class Products extends Admin_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
		$this->load->model('Category_model');
		$this->load->library('upload');
	}

	/**
	 * List all products in admin table
	 */
	public function index() {
		$categorySlug = $this->input->get('kategori', TRUE);
		$keyword      = $this->input->get('q', TRUE);

		$filters = array();
		if (!empty($categorySlug)) {
			$filters['category_slug'] = $categorySlug;
		}
		if (!empty($keyword)) {
			$filters['keyword'] = $keyword;
		}

		$limit = 15;
		$page  = max(1, (int)$this->input->get('page', TRUE));
		$offset = ($page - 1) * $limit;

		$totalProducts = $this->Product_model->countProducts($filters);
		$products      = $this->Product_model->getProducts($filters, $limit, $offset);
		$categories    = $this->Category_model->getAllCategories();

		$data = array(
			'page_title'     => 'Kelola Produk Sepatu',
			'products'       => $products,
			'categories'     => $categories,
			'total_products' => $totalProducts,
			'current_page'   => $page,
			'total_pages'    => ceil($totalProducts / $limit),
			'keyword'        => $keyword,
			'category_slug'  => $categorySlug
		);

		$this->renderAdmin('admin/products/index', $data);
	}

	/**
	 * Form to add a new shoe
	 */
	public function create() {
		$data['page_title']    = 'Tambah Produk Sepatu Baru';
		$data['product']       = null;
		$data['categories']    = $this->Category_model->getAllCategories();
		$data['default_sizes'] = array('39', '40', '41', '42', '43', '44', '45');
		$data['product_sizes'] = array('39', '40', '41', '42', '43', '44');

		$this->renderAdmin('admin/products/form', $data);
	}

	/**
	 * Store newly created shoe
	 */
	public function store() {
		$this->form_validation->set_rules('name', 'Nama Sepatu', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('category_id', 'Kategori Sepatu', 'required|numeric');
		$this->form_validation->set_rules('price', 'Harga Jual', 'required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('original_price', 'Harga Coret', 'numeric');
		$this->form_validation->set_rules('stock', 'Jumlah Stok', 'required|is_natural');
		$this->form_validation->set_rules('description', 'Deskripsi Sepatu', 'trim');

		$sizes = $this->input->post('sizes');
		if (empty($sizes) || !is_array($sizes)) {
			$this->form_validation->set_rules('sizes[]', 'Pilihan Ukuran', 'required');
		}

		if ($this->form_validation->run() === FALSE) {
			$data['page_title']       = 'Tambah Produk Sepatu Baru';
			$data['product']          = null;
			$data['categories']       = $this->Category_model->getAllCategories();
			$data['default_sizes']    = array('39', '40', '41', '42', '43', '44', '45');
			$data['product_sizes']    = is_array($sizes) ? $sizes : array();
			$data['validation_error'] = validation_errors();

			$this->renderAdmin('admin/products/form', $data);
			return;
		}

		// Handle image upload
		$imageName = null;
		if (!empty($_FILES['image']['name'])) {
			$uploadConfig = array(
				'upload_path'   => './uploads/products/',
				'allowed_types' => 'gif|jpg|jpeg|png|webp',
				'max_size'      => 4096, // 4MB
				'encrypt_name'  => TRUE
			);

			$this->upload->initialize($uploadConfig);
			if ($this->upload->do_upload('image')) {
				$uploadData = $this->upload->data();
				$imageName = $uploadData['file_name'];
			} else {
				$this->session->set_flashdata('error', 'Gagal upload foto: ' . $this->upload->display_errors('', ''));
				redirect('admin/products/create');
				return;
			}
		}

		$name  = $this->input->post('name', TRUE);
		$slug  = $this->Product_model->generateUniqueSlug($name);
		$sizesString = implode(',', array_map('trim', $sizes));

		$insertData = array(
			'category_id'     => (int)$this->input->post('category_id', TRUE),
			'name'            => $name,
			'slug'            => $slug,
			'price'           => (float)$this->input->post('price', TRUE),
			'original_price'  => !empty($this->input->post('original_price', TRUE)) ? (float)$this->input->post('original_price', TRUE) : null,
			'stock'           => (int)$this->input->post('stock', TRUE),
			'available_sizes' => $sizesString,
			'image'           => $imageName,
			'description'     => $this->input->post('description', TRUE),
			'is_active'       => $this->input->post('is_active') ? 1 : 0
		);

		$this->Product_model->createProduct($insertData);
		$this->session->set_flashdata('success', 'Sepatu "' . html_escape($name) . '" berhasil ditambahkan ke katalog!');
		redirect('admin/products');
	}

	/**
	 * Form to edit existing shoe
	 *
	 * @param int $id
	 */
	public function edit($id = 0) {
		$product = $this->Product_model->getProductById($id);
		if (!$product) {
			$this->session->set_flashdata('error', 'Produk tidak ditemukan.');
			redirect('admin/products');
		}

		$rawSizes = !empty($product['available_sizes']) ? explode(',', $product['available_sizes']) : array();
		$productSizes = array();
		foreach ($rawSizes as $s) {
			$s = trim($s);
			if (!empty($s)) {
				$productSizes[] = $s;
			}
		}

		$data['page_title']    = 'Edit Produk: ' . $product['name'];
		$data['product']       = $product;
		$data['categories']    = $this->Category_model->getAllCategories();
		$data['default_sizes'] = array('39', '40', '41', '42', '43', '44', '45');
		$data['product_sizes'] = $productSizes;

		$this->renderAdmin('admin/products/form', $data);
	}

	/**
	 * Update shoe details
	 *
	 * @param int $id
	 */
	public function update($id = 0) {
		$product = $this->Product_model->getProductById($id);
		if (!$product) {
			$this->session->set_flashdata('error', 'Produk tidak ditemukan.');
			redirect('admin/products');
		}

		$this->form_validation->set_rules('name', 'Nama Sepatu', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('category_id', 'Kategori Sepatu', 'required|numeric');
		$this->form_validation->set_rules('price', 'Harga Jual', 'required|numeric|greater_than_equal_to[0]');
		$this->form_validation->set_rules('original_price', 'Harga Coret', 'numeric');
		$this->form_validation->set_rules('stock', 'Jumlah Stok', 'required|is_natural');
		$this->form_validation->set_rules('description', 'Deskripsi Sepatu', 'trim');

		$sizes = $this->input->post('sizes');
		if (empty($sizes) || !is_array($sizes)) {
			$this->form_validation->set_rules('sizes[]', 'Pilihan Ukuran', 'required');
		}

		if ($this->form_validation->run() === FALSE) {
			$data['page_title']       = 'Edit Produk: ' . $product['name'];
			$data['product']          = $product;
			$data['categories']       = $this->Category_model->getAllCategories();
			$data['default_sizes']    = array('39', '40', '41', '42', '43', '44', '45');
			$data['product_sizes']    = is_array($sizes) ? $sizes : array();
			$data['validation_error'] = validation_errors();

			$this->renderAdmin('admin/products/form', $data);
			return;
		}

		$imageName = $product['image'];
		if (!empty($_FILES['image']['name'])) {
			$uploadConfig = array(
				'upload_path'   => './uploads/products/',
				'allowed_types' => 'gif|jpg|jpeg|png|webp',
				'max_size'      => 4096,
				'encrypt_name'  => TRUE
			);

			$this->upload->initialize($uploadConfig);
			if ($this->upload->do_upload('image')) {
				$uploadData = $this->upload->data();
				
				// Delete previous image file if exists
				if (!empty($product['image']) && file_exists(FCPATH . 'uploads/products/' . $product['image'])) {
					@unlink(FCPATH . 'uploads/products/' . $product['image']);
				}

				$imageName = $uploadData['file_name'];
			} else {
				$this->session->set_flashdata('error', 'Gagal upload foto: ' . $this->upload->display_errors('', ''));
				redirect('admin/products/edit/' . $id);
				return;
			}
		}

		$name  = $this->input->post('name', TRUE);
		$slug  = $this->Product_model->generateUniqueSlug($name, $id);
		$sizesString = implode(',', array_map('trim', $sizes));

		$updateData = array(
			'category_id'     => (int)$this->input->post('category_id', TRUE),
			'name'            => $name,
			'slug'            => $slug,
			'price'           => (float)$this->input->post('price', TRUE),
			'original_price'  => !empty($this->input->post('original_price', TRUE)) ? (float)$this->input->post('original_price', TRUE) : null,
			'stock'           => (int)$this->input->post('stock', TRUE),
			'available_sizes' => $sizesString,
			'image'           => $imageName,
			'description'     => $this->input->post('description', TRUE),
			'is_active'       => $this->input->post('is_active') ? 1 : 0
		);

		$this->Product_model->updateProduct($id, $updateData);
		$this->session->set_flashdata('success', 'Produk sepatu berhasil diperbarui.');
		redirect('admin/products');
	}

	/**
	 * Delete shoe and its photo file
	 *
	 * @param int $id
	 */
	public function delete($id = 0) {
		$product = $this->Product_model->getProductById($id);
		if ($product) {
			if (!empty($product['image']) && file_exists(FCPATH . 'uploads/products/' . $product['image'])) {
				@unlink(FCPATH . 'uploads/products/' . $product['image']);
			}

			$this->Product_model->deleteProduct($id);
			$this->session->set_flashdata('success', 'Sepatu "' . html_escape($product['name']) . '" berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error', 'Produk tidak ditemukan.');
		}

		redirect('admin/products');
	}
}
