<?php
	class PageManagement
	{
		public function RenderPage()
		{
			if (!isset($_GET["page"]) || empty($_GET["page"])) {
				require_once 'questions.php';
			}
			else {
				$page = $_GET["page"];
				require_once $page;
			}
		}
	}
?>