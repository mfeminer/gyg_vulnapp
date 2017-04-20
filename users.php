<?php
	$session_manager = new SessionManagement();
	if (!$session_manager->IsAuthenticated()) {
		header('Location: index.php?page=login');
	}

	if (!$session_manager->IsAdmin()) {
		header('Location: index.php');
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">
						Kullanıcılar
					</h2>
				</div>
				<div class="panel-body" id="users">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/js/app/users.js"></script>