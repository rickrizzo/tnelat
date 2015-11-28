function post(file, body, callback, args) {
	if (!callback) { callback = default_callback; }
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() { 
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{ callback(xmlhttp.responseText, args); }
	};
	xmlhttp.open('POST', file, true);
	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	xmlhttp.send(body);
}

function get(file, body, callback) {
	query_string = file + '?' + body
	if (!callback) { callback = default_callback; }
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() { 
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{ callback('GET', query_string, xmlhttp.responseText); }
	};
	xmlhttp.open('GET', query_string, true);
	xmlhttp.send();
}

function default_callback(response) {
	console.log(response);
	$('#response').html(response);
}

function sql() {
	args = Array.prototype.slice.call(arguments);
	callback = null;
	if (typeof args[args.length-1] == 'function')
		{ callback = args.pop(); }

	for (var i = 1; i < args.length; i++) {
		args[i] = 'arg' + i + '=' + args[i];
	}
	var query = 'request=' + args.join('&');
	post('sql.php', query, callback);
}