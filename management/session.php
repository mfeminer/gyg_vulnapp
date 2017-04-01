<?php
	
	class SessionManagement
	{
		function __construct()
		{

		}

		public function IsAuthenticated()
		{
			return isset($_COOKIE["is_authenticated"]) && $_COOKIE["is_authenticated"] == true;
		}

		public function IsAdmin($id = '')
		{
			if (!$this->IsAuthenticated()) {
				return false;
			}

			if (empty($id)) {
				$id = $this->GetCurrentUserId();
			}

			return isset($_COOKIE["role"]) && $_COOKIE["role"] == "admin";
		}

		public function LogInUser($user)
		{
			setcookie("is_authenticated", true, time() + (86400 * 30), "/");
			setcookie("userid", $user->id, time() + (86400 * 30), "/");

			if ($user->role == "admin") {
				setcookie("role", $user->role, time() + (86400 * 30), "/");
			}
		}

		public function Logout()
		{
			setcookie("is_authenticated", "", time() - (86400 * 30), "/");
			setcookie("userid", "", time() - (86400 * 30), "/");
			setcookie("role", "", time() - (86400 * 30), "/");
		}

		public function GetCurrentUserId()
		{
			return $_COOKIE["userid"];
		}
	}
?>