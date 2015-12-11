// This file is a framework for making Post requests. Users can instantiate a new
// Post object. They can then add key value pairs to the Post request using the
// addParam... functions. A callback can be set using set_callback, and then 
// 'send' executes the Post request. If no callback is set, the response will
// be outputed to the console log.

function Post (target, callback) {
	this.target = target;
	this.body = '';
	this.callback = callback;
}

Post.prototype.addParamByPair = function (key, value) {
	if (this.body == '')
		this.body = key + '=' + value;
	else
		this.body += '&' + key + '=' + value;
}

Post.prototype.addParamById = function (elementId) {
	var key = $('#' + elementId)[0].name;
	var value = $('#' + elementId)[0].value; 
	this.addParamByPair(key, value);
}

Post.prototype.addParamsById = function () {
	for (var x = 0; x < arguments.length; x++) {
		this.addParamById(arguments[x]);
	}
}

Post.prototype.set_callback = function (callback) {
	this.callback = callback;
}

Post.prototype.send = function () {
	if (!this.callback) { 
		this.callback = function (response) { 
			console.log(response); 
		}
	}

	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = (function(that) {
		return function() { 
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{ that.callback(xmlhttp.responseText); }
		};
	})(this);
	
	xmlhttp.open('POST', this.target, true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send(this.body);
}
