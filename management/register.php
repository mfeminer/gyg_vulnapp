<?php
	require_once 'db.php';

	if ($_POST) {
		$db = new DatabaseManagement("gyg_user", "gyg_pass");

		$username = $_POST["username"];
		$email = $_POST["email"];
		$password = $_POST["password"];
		$confirm_password = $_POST["confirm_password"];
		$is_admin = 0;

		$values = "(username, email, password, is_admin) VALUES('". $username. "', '".$email. "', '".$password. "', false)";

		$result = $db->Insert("users", $values);

		echo "Kayıt Başarılı! Giriş Yapabilirsiniz!";
		return;
	}

	echo "false";
	return;
?>