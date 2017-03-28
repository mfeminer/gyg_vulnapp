<?php
	$session_management = new SessionManagement();
	if ($session_management->IsAuthenticated()) {
		header('Location: index.php');
	}
?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-success">
				<div class="panel-heading">
					<h3 class="panel-title">Giriş Yapın</h3>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label class="control-label">Kullanıcı Adı:</label>
						<input type="text" name="username" id="username" class="form-control" />
					</div>
					<div class="form-group">
						<label class="control-label">Parola:</label>
						<input type="password" name="password" id="password" class="form-control" />
					</div>
					<div class="form-group">
						<button class="btn btn-success pull-right" id="login">Giriş Yap</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>