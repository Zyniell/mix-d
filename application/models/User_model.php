<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * User_model
 * Handles admin authentication, password verification, and brute-force rate limiting.
 */
class User_model extends CI_Model {

	protected $table = 'users';
	protected $tableAttempts = 'login_attempts';

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Find user by username or email
	 *
	 * @param string $identifier
	 * @return array|null
	 */
	public function getByUsernameOrEmail($identifier) {
		$identifier = trim($identifier);
		$this->db->where('username', $identifier);
		$this->db->or_where('email', $identifier);
		return $this->db->get($this->table)->row_array();
	}

	/**
	 * Verify password hash using BCRYPT
	 *
	 * @param string $plainPassword
	 * @param string $hash
	 * @return bool
	 */
	public function verifyPassword($plainPassword, $hash) {
		return password_verify($plainPassword, $hash);
	}

	/**
	 * Check if IP address has exceeded failed login attempts
	 *
	 * @param string $ip
	 * @param int $maxAttempts
	 * @param int $decayMinutes
	 * @return bool TRUE if allowed, FALSE if throttled
	 */
	public function checkRateLimit($ip, $maxAttempts = 5, $decayMinutes = 15) {
		$validFrom = time() - ($decayMinutes * 60);

		// Clean up old attempts
		$this->db->where('attempt_time <', $validFrom);
		$this->db->delete($this->tableAttempts);

		// Count recent attempts
		$this->db->where('ip_address', $ip);
		$this->db->where('attempt_time >=', $validFrom);
		$attempts = $this->db->count_all_results($this->tableAttempts);

		return ($attempts < $maxAttempts);
	}

	/**
	 * Record a failed login attempt
	 *
	 * @param string $ip
	 */
	public function recordFailedAttempt($ip) {
		$this->db->insert($this->tableAttempts, array(
			'ip_address'   => $ip,
			'attempt_time' => time()
		));
	}

	/**
	 * Clear failed login attempts after successful authentication
	 *
	 * @param string $ip
	 */
	public function clearFailedAttempts($ip) {
		$this->db->where('ip_address', $ip);
		$this->db->delete($this->tableAttempts);
	}
}
