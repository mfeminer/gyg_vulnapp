<?php

	class User
	{
		public $id;
		public $username;
		public $email;
		public $password;
		public $role;

		function __construct($fetched_data)
		{
			$this->id = $fetched_data["id"];
			$this->username = $fetched_data["username"];
			$this->email = $fetched_data["email"];
			$this->password = $fetched_data["password"];
			$this->role = $fetched_data["role"];
		}
	}

?>