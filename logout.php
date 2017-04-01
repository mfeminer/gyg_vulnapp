<?php
	$session_manager = new SessionManagement();
	$session_manager->Logout();
	header('Location: index.php');
?>