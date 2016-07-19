<?php
//namespace db;
class Dao extends CI_Model {
	
	function __construct() {
		$this->db = new \db\Mysql;
	
	}
}