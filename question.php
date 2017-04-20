<?php
	$session_manager = new SessionManagement();
	if (!$session_manager->IsAuthenticated()) {
		header('Location: index.php?page=login');
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">
						Soru
					</h3>
				</div>
				<div class="panel-body" id="question">
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<?php 
				require_once 'partials/answerquestion.php';
			?>
		</div>
	</div>
</div>

<script type="text/javascript" src="assets/js/app/question.js"></script>