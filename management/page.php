<?php

	class PageManagement
	{
		public function RenderPage()
		{
			if (!isset($_GET["page"])) {
				require_once 'questions.php';
				return;
			}

			$page = $_GET["page"];

			switch ($page) {
				case 'login':
					require_once 'login.php';
					break;
				case 'logout':
					require_once 'logout.php';
					break;
				case 'profile':
					require_once 'profile.php';
					break;
				case 'question':
					require_once 'question.php';
					break;
				case 'register':
					require_once 'register.php';
					break;
				case 'users':
					require_once 'users.php';
					break;
				default:
					require_once 'questions.php';
					break;
			}
		}

		public function GetCurrentPage()
		{
			if (!isset($_GET["page"]) || empty($_GET["page"])) {
				return 'questions';
			}
			else {
				$page = $_GET["page"];
				return $page;
			}
		}
	}
?>