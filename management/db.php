<?php

	class DatabaseManagement
	{
		public $connection;
		private $username;
		private $password;
		const dbname = "gyg_vulnapp";
		const hostname = "localhost";

		function __construct($username="gyg_user", $password="gyg_pass")
		{
			$this->username = $username;
			$this->password = $password;

			if (!$this->Connect($this->username, $this->password, self::hostname, self::dbname)) {
				throw new Exception("An error occurred when trying to connect database", 1);
			}
		}

		private function Connect($username, $password, $hostname, $dbname)
		{
			$this->connection = new mysqli($hostname, $username, $password, $dbname);

			if ($this->connection->connect_error) {
				$this->connection = null;
				return false;
			}

			return true;
		}

		public function Query($query)
		{
			return $this->connection->query($query);
		}
	}
?>