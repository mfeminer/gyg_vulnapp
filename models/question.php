<?php

	class Question
	{
		public $id;
		public $title;
		public $content;
		public $user;
		public $date;
		public $answers;

		function __construct($fetched_data, $answers = array())
		{
			$this->id = $fetched_data["id"];
			$this->title = $fetched_data["title"];
			$this->content = $fetched_data["content"];
			$this->user = $fetched_data["user"];
			$this->date = $fetched_data["date"];
			$this->answers = $answers;
		}
	}
?>