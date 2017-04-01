<?php
	require_once '../management/db.php';
	require_once '../management/user.php';

	require_once '../models/question.php';
	require_once '../models/answer.php';

	class QuestionManagement
	{
		private $db_manager;

		function __construct()
		{
			$this->db_manager = new DatabaseManagement();
		}

		public function GetQuestions($search="")
		{
			$questions = array();
			if (!empty($search)) {
				$cond = "WHERE content LIKE '". $search ."' OR title LIKE '". $search ."' ORDER BY `date`";
			}
			else{
				$cond = "ORDER BY `date` DESC";
			}

			$question_row = $this->db_manager->Select("questions", $cond);

			if ($question_row->num_rows > 0) {
				while($row = $question_row->fetch_assoc()) {
					$que = new Question($row);
					array_push($questions, $que);
				}
			}

			return $questions;
		}

		public function AddNewQuestion($question, $user)
		{
			$values = "(title, content, user, date) VALUES('". $question->title ."', '". $question->content. "', '". $user->username ."', FROM_UNIXTIME(". time() ."))";
			$this->db_manager->insert("questions", $values);
		}

		public function AddNewAnswer($answer, $user)
		{
			$values = "(content, user, date, que_id) VALUES('". $answer->content. "', '". $user->username ."', FROM_UNIXTIME(". time() ."), ". $answer->que_id .")";
			$this->db_manager->insert("answers", $values);
		}

		public function GetQuestionById($id)
		{
			$que_cond = "WHERE id=". $id;
			$ans_cond = "WHERE que_id=". $id . " ORDER BY `date` DESC";
			$question_row = $this->db_manager->Select("questions", $que_cond);
			$answers_row = $this->db_manager->Select("answers", $ans_cond);

			if ($question_row->num_rows > 0) {
				$answers = array();
				if ($answers_row->num_rows > 0) {
					while($row = $answers_row->fetch_assoc()) {
						$ans = new Answer($row);
						array_push($answers, $ans);
					}
				}

				return new Question($question_row->fetch_assoc(), $answers);
			}
		}
	}
?>