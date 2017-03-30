$(function() {
	var params = {
	}

	getQuestionsSucceeded = function (response) {
		var questions = JSON.parse(response);

		var questionTag = $('div#questions');

		questions.forEach(function (que) {
			var questionPanel = $('<div/>')
				.addClass('panel')
				.addClass('panel-success')
				.appendTo(questionTag);

			var questionPanelBody = $('<div/>')
				.addClass('panel-body')
				.appendTo(questionPanel);

			var questionTitleLink = $('<a/>')
				.attr('href', 'index.php?page=question.php&id=' + que.id)
				.appendTo(questionPanelBody);

			var questionTitle = $('<h3/>')
				.html(que.title)
				.appendTo(questionTitleLink);

			var questionUser = $('<span/>')
				.html(que.user)
				.appendTo(questionPanelBody);
		});
	}

	webRequest.get('management/questions.php', params, getQuestionsSucceeded);
});

askQuestion = function() {
	title = $('#ask-question-title').val();
	content = $('#ask-question-content').val();

	question = {
		title: title,
		content: content
	}

	askQuestionSucceeded = function (response) {
		alert(response);
		window.location.href = "index.php";
	}

	webRequest.post('management/questions.php', question, askQuestionSucceeded);
}

$('button#ask-question').on('click', askQuestion);