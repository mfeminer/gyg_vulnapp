<?php
	require_once 'session.php';
	require_once 'db.php';

	require_once '../models/user.php';

	class UserManagement
	{
		private $db_manager;
		private $session_manager;

		function __construct()
		{
			$this->db_manager = new DatabaseManagement();
			$this->session_manager = new SessionManagement();
		}

		public function GetCurrentUser()
		{
			$current_user_id = $this->session_manager->GetCurrentUserId();
			
			$query = sprintf("SELECT * FROM users WHERE id='%s'",
				mysqli_real_escape_string($this->db_manager->connection, $current_user_id));

			$result = $this->db_manager->Query($query);

			return new User($result->fetch_assoc());
		}

		public function GetUserById($id='')
		{
			if (empty($id)) {
				return null;
			}
			
			$query = sprintf("SELECT * FROM users WHERE id='%s'",
				mysqli_real_escape_string($this->db_manager->connection, $id));

			$result = $this->db_manager->Query($query);

			return new User($result->fetch_assoc());
		}

		public function GetUsers()
		{
			$users = array();
			
			$query = sprintf("SELECT * FROM users");

			$result = $this->db_manager->Query($query);
			
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$user = new User($row);
					array_push($users, $user);
				}
			}
			return $users;
		}

		public function CheckUser($username, $password)
		{
			$query = sprintf("SELECT * FROM users WHERE username='%s' AND password='%s'",
				mysqli_real_escape_string($this->db_manager->connection, $username),
				mysqli_real_escape_string($this->db_manager->connection, $password));

			$result = $this->db_manager->Query($query);

			if($result->num_rows <= 0) {
				return null;
			}

			return new User($result->fetch_assoc());
		}

		// DÜZENLE

		public function AddNewUser($user)
		{
			$query = sprintf("INSERT INTO users (username, email, password, role) VALUES('%s', '%s', '%s', 'user')",
				mysqli_real_escape_string($this->db_manager->connection, $user->username),
				mysqli_real_escape_string($this->db_manager->connection, $user->email),
				mysqli_real_escape_string($this->db_manager->connection, $user->password));

			$result = $this->db_manager->Query($query);
		}

		public function UpdateUser($user)
		{
			$query = sprintf("UPDATE users SET username = '%s', email = '%s', password = '%s', role = '%s' WHERE id='%s'",
				mysqli_real_escape_string($this->db_manager->connection, $user->username),
				mysqli_real_escape_string($this->db_manager->connection, $user->email),
				mysqli_real_escape_string($this->db_manager->connection, $user->password),
				mysqli_real_escape_string($this->db_manager->connection, $user->role),
				mysqli_real_escape_string($this->db_manager->connection, $user->id));

			$result = $this->db_manager->Query($query);
		}

		public function DeleteUser($id)
		{
			$query = sprintf("DELETE FROM users WHERE id='%s'",
				mysqli_real_escape_string($this->db_manager->connection, $user->id));

			$result = $this->db_manager->Query($query);
		}
	}
?>