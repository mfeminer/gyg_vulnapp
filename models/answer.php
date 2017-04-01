<?php

	class Answer
	{
		public $id;
		public $content;
		public $que_id;
		public $date;
		public $user;

		function __construct($fetched_data)
		{
			$this->id = $fetched_data["id"];
			$this->content = $fetched_data["content"];
			$this->user = $fetched_data["user"];
			$this->date = $fetched_data["date"];
			$this->que_id = $fetched_data["que_id"];
		}
	}
?>