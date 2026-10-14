<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Visitor_model
 * Tracks website visits and provides visitor metrics for admin dashboard.
 */
class Visitor_model extends CI_Model {

	protected $table = 'visitor_logs';

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Log visitor activity (records unique daily visitor per IP to prevent table bloat)
	 *
	 * @param string $ip
	 * @param string $userAgent
	 * @param string $pageUrl
	 * @return bool
	 */
	public function logVisit($ip, $userAgent = '', $pageUrl = '/') {
		$today = date('Y-m-d');

		// Check if this IP already visited today
		$this->db->where('ip_address', $ip);
		$this->db->where('visit_date', $today);
		$count = $this->db->count_all_results($this->table);

		if ($count === 0) {
			return $this->db->insert($this->table, array(
				'ip_address' => $ip,
				'user_agent' => $userAgent,
				'page_url'   => $pageUrl,
				'visit_date' => $today,
				'created_at' => date('Y-m-d H:i:s')
			));
		}

		return TRUE;
	}

	/**
	 * Total visitors today
	 * @return int
	 */
	public function getTodayVisitors() {
		$today = date('Y-m-d');
		$this->db->where('visit_date', $today);
		return $this->db->count_all_results($this->table);
	}

	/**
	 * Total all-time recorded visitors
	 * @return int
	 */
	public function getTotalVisitors() {
		return $this->db->count_all_results($this->table);
	}

	/**
	 * Get visitor trend for the last N days
	 *
	 * @param int $days
	 * @return array
	 */
	public function getDailyStats($days = 7) {
		$startDate = date('Y-m-d', strtotime('-' . ($days - 1) . ' days'));

		$this->db->select('visit_date, COUNT(id) AS total_visits');
		$this->db->from($this->table);
		$this->db->where('visit_date >=', $startDate);
		$this->db->group_by('visit_date');
		$this->db->order_by('visit_date', 'ASC');

		$records = $this->db->get()->result_array();

		// Fill missing dates with 0
		$data = array();
		for ($i = $days - 1; $i >= 0; $i--) {
			$date = date('Y-m-d', strtotime('-' . $i . ' days'));
			$data[$date] = 0;
		}

		foreach ($records as $row) {
			$data[$row['visit_date']] = (int)$row['total_visits'];
		}

		return $data;
	}
}
