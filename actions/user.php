<?php
	require_once '../management/user.php';

	require_once '../models/user.php';

	$user_manager = new UserManagement();

	if (isset($_GET["id"])) {
		echo json_encode($user_manager->GetUserById($_GET["id"]));
		return;
	}
	else if ($_POST) {
		return;
	}
?>