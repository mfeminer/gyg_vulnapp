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
				$query = sprintf("SELECT * FROM questions WHERE content LIKE '%s' OR title LIKE '%s' ORDER BY `date`",
					mysqli_real_escape_string($this->db_manager->connection, $search),
					mysqli_real_escape_string($this->db_manager->connection, $search));
			}
			else{
				$query = sprintf("SELECT * FROM questions ORDER BY `date`");
			}

			$result = $this->db_manager->Query($query);

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$que = new Question($row);
					array_push($questions, $que);
				}
			}

			return $questions;
		}

		public function AddNewQuestion($question, $user)
		{
			$query = sprintf("INSERT INTO questions (title, content, user, date) VALUES('%s', '%s', '%s', FROM_UNIXTIME(%s))",
				mysqli_real_escape_string($this->db_manager->connection, $question->title),
				mysqli_real_escape_string($this->db_manager->connection, $question->content),
				mysqli_real_escape_string($this->db_manager->connection, $user->username),
				mysqli_real_escape_string($this->db_manager->connection, time()));

			$result = $this->db_manager->Query($query);
		}

		public function AddNewAnswer($answer, $user)
		{
			$query = sprintf("INSERT INTO answers (content, user, date, que_id) VALUES('%s', '%s', FROM_UNIXTIME(%s), '%s')",
				mysqli_real_escape_string($this->db_manager->connection, $answer->content),
				mysqli_real_escape_string($this->db_manager->connection, $user->username),
				mysqli_real_escape_string($this->db_manager->connection, time()),
				mysqli_real_escape_string($this->db_manager->connection, $answer->que_id));

			$result = $this->db_manager->Query($query);
		}

		public function GetQuestionById($id)
		{
			$que_query = sprintf("SELECT * FROM questions WHERE id='%s'",
				mysqli_real_escape_string($this->db_manager->connection, $id));

			$ans_query = sprintf("SELECT * FROM answers WHERE que_id='%s' ORDER BY `date` DESC",
				mysqli_real_escape_string($this->db_manager->connection, $id));
			
			$que_result = $this->db_manager->Query($que_query);
			$ans_result = $this->db_manager->Query($ans_query);

			if ($que_result->num_rows > 0) {
				$answers = array();
				if ($ans_result->num_rows > 0) {
					while($row = $ans_result->fetch_assoc()) {
						$ans = new Answer($row);
						array_push($answers, $ans);
					}
				}

				return new Question($que_result->fetch_assoc(), $answers);
			}
		}
	}
?>