login = function() {
	username = $('#username').val();
	password = $('#password').val();

	user = {
		username: username,
		password: password
	}

	loginSucceeded = function (response) {
		console.log("successfullyLogin", response);
	}

	webRequest.post('management/login.php', user, loginSucceeded);

}

$('button#login').on('click', login);