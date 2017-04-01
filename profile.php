<?php
	$session_manager = new SessionManagement();
	if (!$session_manager->IsAuthenticated()) {
		header('Location: index.php?page=login.php');
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						Profil Bilgileri
					</h3>
				</div>
				<div class="panel-body" id="profile">
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/js/app/user.js"></script>