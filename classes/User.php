<?php
class User {
	private $_db;
	
	public function __construct($user = null) {
		$this-> db = DB::getInstance();
	}
	
	public function create() {
		if(this->_db->insert('users', $fields)) {
			throw new Exception('Issue creating user account'.);
		}
	}
}