<?php
	$session_management = new SessionManagement();
	if (!$session_management->IsAuthenticated()) {
		header('Location: index.php?page=login.php');
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h2 class="panel-title">
						Sorular
					</h2>
				</div>
				<div class="panel-body" id="questions">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<?php 
				require_once 'partials/askquestion.php';
			?>
		</div>
	</div>
</div>
