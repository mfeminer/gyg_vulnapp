<?php
	require_once '../management/user.php';

	require_once '../models/user.php';

	$user_manager = new UserManagement();

	if (isset($_GET)) {
		echo json_encode($user_manager->GetUsers());
		return;
	}
?>