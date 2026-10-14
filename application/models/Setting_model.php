<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Setting_model
 * Handles store identity, contacts, and configuration.
 */
class Setting_model extends CI_Model {

	protected $table = 'store_settings';

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Get all settings as associative array [key => value]
	 * @return array
	 */
	public function getAllSettings() {
		$query = $this->db->get($this->table);
		$results = $query->result_array();

		$settings = array();
		foreach ($results as $row) {
			$settings[$row['setting_key']] = $row['setting_value'];
		}
		return $settings;
	}

	/**
	 * Get single setting by key
	 *
	 * @param string $key
	 * @param string $default
	 * @return string
	 */
	public function getSetting($key, $default = '') {
		$this->db->where('setting_key', $key);
		$query = $this->db->get($this->table, 1);
		$row = $query->row_array();

		return $row ? $row['setting_value'] : $default;
	}

	/**
	 * Update multiple settings from associative array [key => value]
	 *
	 * @param array $settings
	 * @return bool
	 */
	public function updateSettings($settings) {
		if (!is_array($settings)) {
			return FALSE;
		}

		$this->db->trans_start();
		foreach ($settings as $key => $value) {
			// Check if exists
			$this->db->where('setting_key', $key);
			$count = $this->db->count_all_results($this->table);

			if ($count > 0) {
				$this->db->where('setting_key', $key);
				$this->db->update($this->table, array('setting_value' => $value));
			} else {
				$this->db->insert($this->table, array(
					'setting_key' => $key,
					'setting_value' => $value
				));
			}
		}
		$this->db->trans_complete();

		return $this->db->trans_status();
	}
}
