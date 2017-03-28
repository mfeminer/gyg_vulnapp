$(function() {
	var params = {
		page = 1,
		pageSize = 10
	}

	getQuestionsSucceeded = function (response) {
		console.log("questions: ", response);
	}

	webRequest.get('management/questions.php', params, getQuestionsSucceeded);
});