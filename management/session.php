<?php
	
	class SessionManagement
	{
		function __construct()
		{

		}

		public function IsAuthenticated()
		{
			return isset($_COOKIE["is_authenticated"]);
		}

		public function IsAdmin($user_name = '')
		{
			if (empty($user_name)) {
				return false;
			}

			if (!IsAuthenticated()) {
				return false;
			}

			return isset($_COOKIE["is_admin"]);
		}

		public function LogInUser($user)
		{
			setcookie("is_authenticated", true, time() + (86400 * 30), "/");
			setcookie("userid", $user->id, time() + (86400 * 30), "/");

			if ($user->is_admin) {
				setcookie("is_admin", $user.is_admin, time() + (86400 * 30), "/");
			}
		}

		public function GetCurrentUserId()
		{
			return $_COOKIE["userid"];
		}
	}
?>