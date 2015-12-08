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
