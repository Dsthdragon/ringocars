<?php

class index_model extends model
{
	function __construct()
	{
		parent::__construct();
	}

	function getMakes(){
		return $this->db->select("SELECT * FROM make ORDER BY make ASC");
	}

	function getTypes(){
		return $this->db->select("SELECT * FROM type ORDER BY type ASC");
	}
}
