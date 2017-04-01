$(function() {
	var params = {
		id: getParameterByName("id")
	}

	webRequest.get('actions/questions.php', params, getQuestionSucceeded);
});

getQuestionSucceeded = function (response) {
	var question = JSON.parse(response);

	var questionTag = $('div#question');
	
	var questionPanel = $('<div/>')
		.addClass('panel')
		.addClass('panel-success')
		.appendTo(questionTag);

	var questionPanelBody = $('<div/>')
		.addClass('panel-body')
		.appendTo(questionPanel);

	var questionTitle = $('<h3/>')
		.html(question.title)
		.appendTo(questionPanelBody);

	var questionContent = $('<p/>')
		.html(question.content)
		.appendTo(questionPanelBody);

	var questionUser = $('<span/>')
		.html(question.user + " - " + question.date)
		.appendTo(questionPanelBody);

	question.answers.forEach(function (ans) {
		var answerPanel = $('<div/>')
			.addClass('panel')
			.addClass('panel-info')
			.appendTo(questionPanelBody);

		var answerPanelBody = $('<div/>')
			.addClass('panel-body')
			.appendTo(answerPanel);

		var answerContent = $('<h3/>')
			.html(ans.content)
			.appendTo(answerPanelBody);

		var answerUser = $('<span/>')
			.html(ans.user + " - " + ans.date)
			.appendTo(answerPanelBody);
	});
}

answerQuestion = function() {
	content = $('#answer-question-content').val();

	answer = {
		content: content,
		que_id: getParameterByName("id")
	}

	webRequest.post('actions/answer.php', answer, answerQuestionSucceeded);
}

answerQuestionSucceeded = function (response) {
	$('#answer-question-content').val('');
	window.location.reload();
}

$('button#answer-question').on('click', answerQuestion);


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