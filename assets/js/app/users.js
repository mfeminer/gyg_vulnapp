$(function() {
	var params = {
	}

	webRequest.get('actions/users.php', params, getUsersSucceeded);
});

getUsersSucceeded = function (response) {
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
			.text("Kullanıcı adı:" + user.username)
			.appendTo(userPanelBody);

		var email = $('<p/>')
			.text("E-posta:" + user.email)
			.appendTo(userPanelBody);

		var role = $('<p/>')
			.text("Rol:" + user.role)
			.appendTo(userPanelBody);

		var userDeleteButton = $('<button/>')
			.addClass('btn btn-danger')
			.text('Delete User')
			.attr('type', 'button')
			.attr('onClick', 'deleteUser('+ user.id +')')
			.appendTo(userPanelBody);
	});
}

deleteUser = function (id) {
	if (confirm("Silmek İstediğinize emin misiniz?")) {
		var params = {
			actiontype: "delete",
			id: id
		}

		webRequest.post('actions/user.php', params, deleteUserSucceeded);	
	}
}

function deleteUserSucceeded() {
	window.location.reload();
}