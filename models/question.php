<?php
	/**
	* 
	*/
	class Question
	{
		public $id;
		public $title;
		public $content;
		public $user;
		public $reg_date;

		function __construct($fetched_data)
		{
			$this->id = $fetched_data["id"];
			$this->title = $fetched_data["title"];
			$this->content = $fetched_data["content"];
			$this->user = $fetched_data["user"];
			$this->reg_date = $fetched_data["reg_date"];
		}
	}
?>