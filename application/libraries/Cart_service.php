<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Cart_service
 * Handles session-based shopping cart for Mix-D Men's Footwear.
 * Supports shoe sizing variants and WhatsApp checkout formatting.
 */
class Cart_service {

	protected $CI;
	protected $sessionKey = 'mixd_cart';

	public function __construct() {
		$this->CI =& get_instance();
	}

	/**
	 * Get all items from the cart session
	 * @return array
	 */
	public function getItems() {
		$cart = $this->CI->session->userdata($this->sessionKey);
		return is_array($cart) ? $cart : array();
	}

	/**
	 * Add product to cart with chosen size
	 *
	 * @param array $product Product record from database
	 * @param string $size Shoe size (e.g. '42')
	 * @param int $qty Quantity
	 * @return bool
	 */
	public function addItem($product, $size, $qty = 1) {
		$size = trim((string)$size);
		$qty = max(1, (int)$qty);

		if (empty($product) || empty($size)) {
			return FALSE;
		}

		$cart = $this->getItems();
		$key = $product['id'] . '_' . preg_replace('/[^a-zA-Z0-9]/', '', $size);

		if (isset($cart[$key])) {
			$cart[$key]['qty'] += $qty;
			$cart[$key]['subtotal'] = $cart[$key]['qty'] * $cart[$key]['price'];
		} else {
			$price = (float)$product['price'];
			$cart[$key] = array(
				'key'        => $key,
				'product_id' => (int)$product['id'],
				'name'       => $product['name'],
				'slug'       => $product['slug'],
				'price'      => $price,
				'size'       => $size,
				'qty'        => $qty,
				'image'      => !empty($product['image']) ? $product['image'] : '',
				'subtotal'   => $price * $qty
			);
		}

		$this->CI->session->set_userdata($this->sessionKey, $cart);
		return TRUE;
	}

	/**
	 * Update quantity of a cart item
	 *
	 * @param string $key
	 * @param int $qty
	 * @return bool
	 */
	public function updateItem($key, $qty) {
		$cart = $this->getItems();
		$qty = (int)$qty;

		if (!isset($cart[$key])) {
			return FALSE;
		}

		if ($qty <= 0) {
			return $this->removeItem($key);
		}

		$cart[$key]['qty'] = $qty;
		$cart[$key]['subtotal'] = $cart[$key]['price'] * $qty;
		$this->CI->session->set_userdata($this->sessionKey, $cart);
		return TRUE;
	}

	/**
	 * Remove single item from cart
	 *
	 * @param string $key
	 * @return bool
	 */
	public function removeItem($key) {
		$cart = $this->getItems();
		if (isset($cart[$key])) {
			unset($cart[$key]);
			$this->CI->session->set_userdata($this->sessionKey, $cart);
			return TRUE;
		}
		return FALSE;
	}

	/**
	 * Clear all items in cart
	 */
	public function clear() {
		$this->CI->session->unset_userdata($this->sessionKey);
	}

	/**
	 * Calculate total count of items in cart
	 * @return int
	 */
	public function totalItems() {
		$cart = $this->getItems();
		$count = 0;
		foreach ($cart as $item) {
			$count += (int)$item['qty'];
		}
		return $count;
	}

	/**
	 * Calculate total price of cart
	 * @return float
	 */
	public function totalPrice() {
		$cart = $this->getItems();
		$total = 0;
		foreach ($cart as $item) {
			$total += (float)$item['subtotal'];
		}
		return $total;
	}

	/**
	 * Format rupiah currency
	 *
	 * @param float|int $amount
	 * @return string
	 */
	public function formatRupiah($amount) {
		return 'Rp ' . number_format((float)$amount, 0, ',', '.');
	}

	/**
	 * Generate formatted order text for WhatsApp
	 *
	 * @param array $customer
	 * @param string $storeName
	 * @return string
	 */
	public function buildWhatsAppMessage($customer, $storeName = 'Mix-D') {
		$cart = $this->getItems();
		if (empty($cart)) {
			return '';
		}

		$message  = "Halo *" . $storeName . "*, saya ingin memesan sepatu berikut:\n\n";
		$message .= "🛒 *DETAIL PESANAN:*\n";

		$num = 1;
		foreach ($cart as $item) {
			$message .= $num . ". *" . $item['name'] . "*\n";
			$message .= "   - Ukuran: *" . $item['size'] . "*\n";
			$message .= "   - Jumlah: " . $item['qty'] . " pasang\n";
			$message .= "   - Harga: " . $this->formatRupiah($item['price']) . "\n";
			$message .= "   - Subtotal: " . $this->formatRupiah($item['subtotal']) . "\n\n";
			$num++;
		}

		$message .= "💰 *TOTAL BELANJA:* " . $this->formatRupiah($this->totalPrice()) . "\n\n";
		$message .= "👤 *DATA PENERIMA:*\n";
		$message .= "• Nama: " . trim($customer['customer_name']) . "\n";
		$message .= "• No. WhatsApp: " . trim($customer['customer_phone']) . "\n";
		$message .= "• Alamat Pengiriman:\n" . trim($customer['shipping_address']) . "\n";

		if (!empty($customer['notes'])) {
			$message .= "• Catatan: " . trim($customer['notes']) . "\n";
		}

		$message .= "\nMohon konfirmasi ketersediaan stok & nomor rekening untuk pembayaran. Terima kasih!";

		return $message;
	}
}
