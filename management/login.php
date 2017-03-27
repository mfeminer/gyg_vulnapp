<?php
	require_once 'models/user.php';

	if ($_POST) {
		$session_management = new SessionManagement();
		$db = new DatabaseManagement("gyg_user", "gyg_pass");

		$username = $_POST["username"];
		$password = $_POST["password"];

		$cond = "username=". $username ." password=". $password;

		$result = $db->Select("users", $cond);

		if ($result->num_rows <= 0) {
			echo "false";
		}

		$user = new User($result->fetch_assoc());

		$session_management->LogInUser($user);

		echo "true";
	}

	echo "false";
?>