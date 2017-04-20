<?php
	session_start();
	
	class SessionManagement
	{
		function __construct()
		{

		}

		public function IsAuthenticated()
		{
			return isset($_SESSION["is_authenticated"]) && $_SESSION["is_authenticated"] == true;
		}

		public function IsAdmin($id = '')
		{
			if (!$this->IsAuthenticated()) {
				return false;
			}

			if (empty($id)) {
				$id = $this->GetCurrentUserId();
			}

			return isset($_SESSION["role"]) && $_SESSION["role"] == "admin";
		}

		public function LogInUser($user)
		{
			$_SESSION["is_authenticated"] = true;
			$_SESSION["userid"] = $user->id;

			if ($user->role == "admin") {
				$_SESSION["role"] = $user->role;
			}
		}

		public function Logout()
		{
			session_unset();
			session_destroy(); 
		}

		public function GetCurrentUserId()
		{
			return $_SESSION["userid"];
		}
	}
?>