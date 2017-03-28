<?php

	class DatabaseManagement
	{
		private $connection;
		private $username;
		private $password;
		const dbname = "gyg_vulnapp";
		const hostname = "localhost";

		function __construct($username, $password)
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

		public function Select($table_name, $condition_string)
		{
			$query = "SELECT * FROM ". $table_name ." ". $condition_string;
			return $this->connection->query($query);
		}

		public function Insert($table_name, $values_string)
		{
			$query = "INSERT INTO ". $table_name ." ". $values_string;
			return $this->connection->query($query);
		}
	}
?>