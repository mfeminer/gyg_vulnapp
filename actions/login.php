<?php
	require_once '../management/user.php';
	require_once '../management/session.php';

	require_once '../models/user.php';

	if ($_POST) {
		$user_manager = new UserManagement();
		$session_manager = new SessionManagement();

		$username = $_POST["username"];
		$password = $_POST["password"];

		$user = $user_manager->CheckUser($username, $password);

		if (empty($user)) {
			echo "Kullanıcı-Parola Hatalı!";
			return;
		}

		$session_manager->LogInUser($user);

		echo "Giriş Başarılı";
		return;
	}
?>