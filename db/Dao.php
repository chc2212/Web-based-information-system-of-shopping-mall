<?php
namespace db;
class Dao extends \db\myModel{
	
	function __construct() {
		$this->db = new \db\Mysql;
	
	}
}