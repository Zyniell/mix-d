<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Cart Controller
 * Handles shopping cart interactions and WhatsApp checkout generator.
 */
class Cart extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Product_model');
	}

	/**
	 * View shopping cart page & WhatsApp checkout form
	 */
	public function index() {
		$data['page_title'] = 'Keranjang Belanja';
		$data['cart_items'] = $this->cart_service->getItems();
		$data['cart_total'] = $this->cart_service->totalPrice();
		$data['cart_count'] = $this->cart_service->totalItems();

		$this->render('cart/index', $data);
	}

	/**
	 * Add item to cart with selected size
	 */
	public function add() {
		$productId = (int)$this->input->post('product_id', TRUE);
		$size      = trim($this->input->post('size', TRUE));
		$qty       = max(1, (int)$this->input->post('qty', TRUE));

		if (empty($productId)) {
			$this->session->set_flashdata('error', 'Produk tidak valid.');
			redirect('produk');
		}

		if (empty($size)) {
			$this->session->set_flashdata('error', 'Silakan pilih ukuran sepatu terlebih dahulu.');
			redirect('produk');
		}

		$product = $this->Product_model->getProductById($productId);
		if (!$product || $product['is_active'] != 1) {
			$this->session->set_flashdata('error', 'Produk tidak ditemukan atau sedang tidak aktif.');
			redirect('produk');
		}

		$this->cart_service->addItem($product, $size, $qty);
		$this->session->set_flashdata('success', 'Sepatu "' . html_escape($product['name']) . '" ukuran ' . html_escape($size) . ' berhasil ditambahkan ke keranjang!');
		redirect('keranjang');
	}

	/**
	 * Update item quantity in cart
	 */
	public function update() {
		$key = $this->input->post('key', TRUE);
		$qty = (int)$this->input->post('qty', TRUE);

		if (!empty($key)) {
			$this->cart_service->updateItem($key, $qty);
			$this->session->set_flashdata('success', 'Keranjang belanja berhasil diperbarui.');
		}

		redirect('keranjang');
	}

	/**
	 * Remove single item from cart
	 *
	 * @param string $key
	 */
	public function remove($key = '') {
		if (!empty($key)) {
			$this->cart_service->removeItem($key);
			$this->session->set_flashdata('success', 'Item berhasil dihapus dari keranjang.');
		}

		redirect('keranjang');
	}

	/**
	 * Clear all items in cart
	 */
	public function clear() {
		$this->cart_service->clear();
		$this->session->set_flashdata('success', 'Keranjang belanja telah dikosongkan.');
		redirect('keranjang');
	}

	/**
	 * Process WhatsApp checkout
	 */
	public function checkout() {
		$cart = $this->cart_service->getItems();
		if (empty($cart)) {
			$this->session->set_flashdata('error', 'Keranjang belanja Anda masih kosong. Silakan pilih sepatu terlebih dahulu.');
			redirect('produk');
		}

		// Server-side validation
		$this->form_validation->set_rules('customer_name', 'Nama Pemesan', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('customer_phone', 'Nomor WhatsApp', 'required|trim|numeric|min_length[9]|max_length[20]');
		$this->form_validation->set_rules('shipping_address', 'Alamat Pengiriman', 'required|trim|min_length[10]');
		$this->form_validation->set_rules('notes', 'Catatan Pesanan', 'trim|max_length[300]');

		if ($this->form_validation->run() === FALSE) {
			$data['page_title']       = 'Keranjang Belanja';
			$data['cart_items']       = $cart;
			$data['cart_total']       = $this->cart_service->totalPrice();
			$data['cart_count']       = $this->cart_service->totalItems();
			$data['validation_error'] = validation_errors();

			$this->render('cart/index', $data);
			return;
		}

		$customer = array(
			'customer_name'    => $this->input->post('customer_name', TRUE),
			'customer_phone'   => $this->input->post('customer_phone', TRUE),
			'shipping_address' => $this->input->post('shipping_address', TRUE),
			'notes'            => $this->input->post('notes', TRUE)
		);

		$storeName = isset($this->store_settings['store_name']) ? $this->store_settings['store_name'] : 'Mix-D Men\'s Footwear';
		$waTarget  = isset($this->store_settings['whatsapp_number']) ? preg_replace('/[^0-9]/', '', $this->store_settings['whatsapp_number']) : '';

		if (empty($waTarget)) {
			$this->session->set_flashdata('error', 'Nomor WhatsApp toko belum dikonfigurasi oleh admin. Mohon hubungi pihak toko.');
			redirect('keranjang');
		}

		// Generate formatted WhatsApp message text
		$messageText = $this->cart_service->buildWhatsAppMessage($customer, $storeName);

		// Clear cart upon successful order dispatch
		$this->cart_service->clear();

		// Encode WhatsApp link
		$waUrl = 'https://api.whatsapp.com/send?phone=' . $waTarget . '&text=' . rawurlencode($messageText);

		// Pass to success confirmation screen with instant redirect and manual backup link
		$data['page_title'] = 'Pesanan Siap Dikirim ke WhatsApp';
		$data['wa_url']     = $waUrl;
		$data['customer']   = $customer;
		$data['message_text'] = $messageText;

		$this->render('cart/success', $data);
	}
}
