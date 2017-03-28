<?php
	require_once 'models/question.php';
	
	$questions = array();

	if ($_GET) {

		$db = new DatabaseManagement("gyg_user", "gyg_pass");

		$page = $_POST["page"];
		$page_size = $_POST["pageSize"];

		$cond = "WHERE visible=TRUE LIMIT ". ($page-1)*$page_size .", ". $page_size;

		$result = $db->Select("questions", $cond);


		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$que = new Question($row["id"], $row["title"]);
				array_push($questions, $que);
			}
		}
	}

	echo $questions;
	return;
?>