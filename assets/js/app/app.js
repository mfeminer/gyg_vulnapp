login = function() {
	username = $('#username').val();
	password = $('#password').val();

	user = {
		username: username,
		password: password
	}

	loginSucceeded = function (response) {
		alert(response);
		window.location.href = "index.php";
	}

	webRequest.post('management/login.php', user, loginSucceeded);

}

register = function() {
	username = $('#username').val();
	password = $('#password').val();
	confirm_password = $('#confirm_password').val();
	email = $('#email').val();

	user = {
		username: username,
		password: password,
		confirm_password: confirm_password,
		email: email
	}

	registerSucceeded = function (response) {
		alert(response);
		window.location.href = "index.php";
	}

	webRequest.post('management/register.php', user, registerSucceeded);

}

$('button#login').on('click', login);
$('button#register').on('click', register);