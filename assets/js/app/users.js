$(function() {
	var params = {
	}

	webRequest.get('actions/users.php', params, getUserSucceeded);
});

searchuser = function () {
}

getUserSucceeded = function (response) {
	var users = JSON.parse(response);

	var userTag = $('div#users');

	userTag.html('');

	users.forEach(function (user) {
		var userPanel = $('<div/>')
			.addClass('panel')
			.addClass('panel-success')
			.appendTo(userTag);

		var userPanelBody = $('<div/>')
			.addClass('panel-body')
			.appendTo(userPanel);

		var userName = $('<p/>')
			.html("<span class='bold'>Kullanıcı adı:</span> " + user.username)
			.appendTo(userPanelBody);

		var email = $('<p/>')
			.html("<span class='bold'>E-posta:</span> " + user.email)
			.appendTo(userPanelBody);

		var role = $('<p/>')
			.html("<span class='bold'>Rol:</span> " + user.role)
			.appendTo(userPanelBody);
	});
}