<?php

class Model{
	protected $db;
	function __construct(){
		include './database/config.php';
		$this->db = Database::getinstance($config);
	}
}

?>