function Database_Operation() {
	this.func = null
	this.args = null
	this.callback = null
	this.execute
}

Login.prototype = new Database_Operation;
function Login (username, password) {
	this.func = 'get_user_info';
	this.args = [username];
	this.username = username;
	this.password = password;
}

