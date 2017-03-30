<?php
	require_once '../models/question.php';
	require_once '../management/db.php';

	if ($_GET) {
	
		$questions = array();

		$db = new DatabaseManagement("gyg_user", "gyg_pass");

		$cond = "WHERE visible=TRUE";

		$result = $db->Select("questions", $cond);


		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$que = new Question($row);
				array_push($questions, $que);
			}
		}

		echo json_encode($questions);
		return;
	}

	if ($_POST) {
		$title = $_POST["title"];
		$content = $_POST["content"];
		$date = date("Y-m-d H:i:s");

		echo "string";  // TODO: add que
	}
?>