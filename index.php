<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once 'management/session.php';
	require_once 'management/page.php';


	$session_management = new SessionManagement();
	$page_management = new PageManagement();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<title>GYG Vuln App</title>
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">GYG VulnApp</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-left">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Arama...">
					</div>
					<button type="submit" class="btn btn-default">Ara</button>
				</form>
				<?php
				if (!$session_management->IsAuthenticated()) {
				?>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php?page=register.php">Kayıt</a></li>
					<li><a href="index.php?page=login.php">Giriş Yap</a></li>
				</ul>
				<?php
				}
				?>
			</div>
		</div>
	</nav>
	<?php
		$page_management->RenderPage();
	?>
	<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/app/webRequest.js"></script>
	<script type="text/javascript" src="assets/js/app/app.js"></script>
</body>
</html>