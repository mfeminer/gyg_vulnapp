<?php
	require_once '../management/user.php';

	require_once '../models/user.php';

	if ($_POST) {
		$user_manager = new UserManagement();

		$user = new User($_POST);

		$user_manager->AddNewUser($user);

		echo "Kayıt Başarılı! Giriş Yapabilirsiniz!";
		return;
	}
?>