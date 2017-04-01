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
			$cond = "WHERE id=". $current_user_id;

			$user_row = $this->db_manager->Select("users",  $cond);

			return new User($user_row->fetch_assoc());
		}

		public function GetUserById($id='')
		{
			if (empty($id)) {
				return null;
			}

			$cond = "WHERE id=". $id;

			$user_row = $this->db_manager->Select("users",  $cond);

			return new User($user_row->fetch_assoc());
		}

		public function GetUsers()
		{
			$users = array();

			$user_row = $this->db_manager->Select("users",  $cond);
			
			if ($user_row->num_rows > 0) {
				while($row = $user_row->fetch_assoc()) {
					$user = new User($row);
					array_push($users, $user);
				}
			}
			return $users;
		}

		public function CheckUser($username, $password)
		{
			$cond = "WHERE username='". $username ."' AND password='". $password ."'";

			$user_row = $this->db_manager->Select("users",  $cond);

			if($user_row->num_rows <= 0) {
				return null;
			}

			return new User($user_row->fetch_assoc());
		}

		public function AddNewUser($user)
		{			
			$values = "(username, email, password, role) VALUES('". $user->username. "', '" .$user->email. "', '" .$user->password. "', 'user')";

			$result = $this->db_manager->Insert("users", $values);
		}

		public function UpdateUser($user)
		{
			$values = "(username, email, password, role) VALUES('". $user->username. "', '" .$user->email. "', '". $user->password ."', '". $user->role ."')";
			$cond = "id=". $user->id;

			$result = $this->db_manager->Update("users", $values, $cond);
		}

		public function DeleteUser($id)
		{			
			$cond = "id=". $id;

			$result = $this->db_manager->Delete("users", $cond);
		}
	}
?>