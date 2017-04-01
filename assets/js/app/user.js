$(function() {
	var params = {
		id: getParameterByName("id")
	}

	webRequest.get('actions/user.php', params, getUserSucceeded);
});

getUserSucceeded = function (response) {
	var user = JSON.parse(response);

	var userTag = $('div#profile');

	var userName = $('<p/>')
		.html("<span class='bold'>Kullanıcı adı:</span> " + user.username)
		.appendTo(userTag);

	var email = $('<p/>')
		.html("<span class='bold'>E-posta:</span> " + user.email)
		.appendTo(userTag);

	var role = $('<p/>')
		.html("<span class='bold'>Rol:</span> " + user.role)
		.appendTo(userTag);
}

getParameterByName = function(name, url) {
	if (!url) {
		url = window.location.href;
	}
	name = name.replace(/[\[\]]/g, "\\$&");
	var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	results = regex.exec(url);
	if (!results) return null;
	if (!results[2]) return '';
		return decodeURIComponent(results[2].replace(/\+/g, " "));
}