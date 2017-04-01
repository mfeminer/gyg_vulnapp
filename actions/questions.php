<?php
	require_once '../management/question.php';
	require_once '../management/user.php';

	require_once '../models/question.php';

	$question_manager = new QuestionManagement();
	$user_manager = new UserManagement();

	if (isset($_GET["search"])) {
		echo json_encode($question_manager->GetQuestions($_GET["search"]));
		return;
	}
	else if (isset($_GET["id"])) {
		echo json_encode($question_manager->GetQuestionById($_GET["id"]));
		return;
	}
	else if ($_POST) {

		$question = new Question($_POST);
		$user = $user_manager->GetCurrentUser();

		echo $question_manager->AddNewQuestion($question, $user);

		return;
	}
?>