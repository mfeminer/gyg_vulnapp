<?php
	require_once 'db.php';
	require_once 'session.php';
	require_once '../models/user.php';

	if ($_POST) {
		$session_management = new SessionManagement();
		$db = new DatabaseManagement("gyg_user", "gyg_pass");

		$username = $_POST["username"];
		$password = $_POST["password"];

		$cond = "WHERE username='". $username ."' AND password='". $password ."'";

		$result = $db->Select("users", $cond);

		if ($result->num_rows <= 0) {
			echo "Kullanıcı-Parola Hatalı!";
			return;
		}

		$user = new User($result->fetch_assoc());

		$session_management->LogInUser($user);

		echo "Giriş Başarılı";
		return;
	}

	echo "false";
	return;
?>