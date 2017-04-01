login = function() {
	username = $('#username').val();
	password = $('#password').val();

	user = {
		username: username,
		password: password
	}

	webRequest.post('actions/login.php', user, loginSucceeded);
}

loginSucceeded = function (response) {
	alert(response);
	window.location.href = "index.php";
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

	webRequest.post('actions/register.php', user, registerSucceeded);
}

registerSucceeded = function (response) {
	alert(response);
	window.location.href = "index.php";
}

$('button#login').on('click', login);
$('button#register').on('click', register);