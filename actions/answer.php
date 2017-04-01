<?php
	require_once '../management/question.php';
	require_once '../management/user.php';

	require_once '../models/answer.php';

	$question_manager = new QuestionManagement();
	$user_manager = new UserManagement();

	if ($_POST) {

		$answer = new Answer($_POST);
		$user = $user_manager->GetCurrentUser();

		echo $question_manager->AddNewAnswer($answer, $user);

		return;
	}
?>