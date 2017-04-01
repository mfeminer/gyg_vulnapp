<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	require_once 'management/session.php';
	require_once 'management/page.php';

	$session_manager = new SessionManagement();
	$page_manager = new PageManagement();
?>
<!DOCTYPE html>
<html lang="tr">
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-theme.min.css">
	<title>GYG Vuln App</title>
	
	<script type="text/javascript" src="assets/js/jquery-3.2.0.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/app/webRequest.js"></script>
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
				<?php
					if ($page_manager->GetCurrentPage() == "questions.php") {
						require_once 'partials/searchform.php';
					}
				?>
				<ul class="nav navbar-nav navbar-right">
				<?php
				if (!$session_manager->IsAuthenticated()) {
				?>
					<li><a href="index.php?page=register.php">Kayıt</a></li>
					<li><a href="index.php?page=login.php">Giriş Yap</a></li>
				<?php
				}
				else {
					if($session_manager->IsAdmin()){
				?>
					<li><a href="index.php?page=users.php">Kullanıcılar</a></li>
				<?php
					}
				?>
					<li><a href="index.php?page=profile.php&id=<?php echo $session_manager->GetCurrentUserId(); ?>">Profil</a></li>
					<li><a href="index.php?page=logout.php">Çıkış Yap</a></li>
				<?php
				}
				?>
				</ul>
			</div>
		</div>
	</nav>
	<?php
		$page_manager->RenderPage();
	?>
</body>
</html>