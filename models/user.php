<?php
	/**
	* 
	*/
	class User
	{
		public $id;
		public $username;
		public $password;
		public $is_admin;
		public $reg_date;

		function __construct($fetched_data)
		{
			$this->id = $fetched_data["id"];
			$this->username = $fetched_data["username"];
			$this->password = $fetched_data["password"];
			$this->is_admin = $fetched_data["is_admin"];
		}
	}

?>