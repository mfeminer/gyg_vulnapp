$(function() {
	searchQuestion();
});

searchQuestion = function () {
	var params = {
		search: $('#search-question-input').val()
	}

	webRequest.get('actions/questions.php', params, searchQuestionsSucceeded);
}

searchQuestionsSucceeded = function (response) {
	var questions = JSON.parse(response);

	var questionTag = $('div#questions');

	questionTag.text('');

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
			.text(que.title)
			.appendTo(questionTitleLink);

		var questionUser = $('<span/>')
			.text(que.user + " - " + que.date)
			.appendTo(questionPanelBody);
	});
}

askQuestion = function() {
	title = $('#ask-question-title').val();
	content = $('#ask-question-content').val();

	question = {
		title: title,
		content: content
	}

	webRequest.post('actions/questions.php', question, askQuestionSucceeded);
}

askQuestionSucceeded = function (response) {
	window.location.href = "index.php";
}

$('button#ask-question').on('click', askQuestion);
$('button#search-question').on('click', searchQuestion);