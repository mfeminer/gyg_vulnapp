<?php
	require_once '../management/user.php';

	require_once '../models/user.php';

	$user_manager = new UserManagement();

	if (isset($_GET["id"])) {
		echo json_encode($user_manager->GetUserById($_GET["id"]));
		return;
	}
	else if (isset($_POST["actiontype"])) {
		if ($_POST["actiontype"] == "update") {
			$user_manager->UpdateUser(new User($_POST["user"]));
		}
		else if ($_POST["actiontype"] == "delete") {
			$user_manager->DeleteUser($_POST["id"]);
		}
	}

	return;
?>