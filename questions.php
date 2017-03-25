<?php
	$session_management = new SessionManagement();
	if (!$session_management->IsAuthenticated()) {
		header('Location: index.php?page=login.php');
	}
?>