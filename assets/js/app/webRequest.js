webRequest = {
	post: function (url, data, successCallback, errorCallback) {
		this.send('POST', url, data, successCallback, errorCallback);	
	},
	get: function (url, data, successCallback, errorCallback) {
		this.send('GET', url, data, successCallback, errorCallback);
	},
	send: function (type, url, data, successCallback, errorCallback) {
		if (!successCallback) {
			successCallback = this.defaultSuccessCallback;
		}

		if (!errorCallback) {
			errorCallback = this.defaultErrorCallback;
		}

		$.ajax({
			type: type,
			url: url,
			async: true,
			data: data,
			success: successCallback,
			error: errorCallback
		});
	},
	defaultSuccessCallback: function (response, r,e) {
		console.log("success", response, r, e);
	},
	defaultErrorCallback: function (response, r,e) {
		console.log("error", response, r, e);
	}
}