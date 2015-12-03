<?php
	session_start();
	if (isset($_SESSION['id'])) {
		header("Location: test.html");
	}
	else {
		echo ('bye');
	}
?>

<!DOCTYPE html>
<html>
	<body>

		<h1>Add a user</h1>

		<style> 
			input {
				display: block;
			}
		</style>

		<form>
			Username: <input id='u_name' type='field' name='username'> </input>
			Password: <input id='u_pass' type='field' name='password'> </input>
			Confirm Password: <input id='u_passconf' type='field' name='password_confirm'> </input>
			Email: <input id='u_email' type='field' name='email'> </input>
			First Name: <input id='u_fname' type='field' name='first_name'> </input>
			Last Name: <input id='u_lname' type='field' name='last_name'> </input>
			Phone: <input id='u_phone' type='field' name='phone'> </input>
			<input id='u_submit' type='button' value='create'> </input>
			<input id='u_authenticate' type='button' value='login'> </input>
		</form>

		<!--<form>
			Sender: <input id='c_sender' type='field' name='name'> </input>
			Recipient: <input id='c_recipient' type='field' name='pass'> </input>
			Rating: <input id='c_rating' type='field' name='email'> </input>
			Body: <input id='c_body' type='field' name='email'> </input>
			<input id='c_submit' type='button' value='submit'> </input>
		</form>-->

		<div id='response'></div>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<script src='http.js'></script>
		<script src='Post.js'></script>
		<script>


			$('#u_submit').click( function() { 
				var PostReq = new Post('create_account.php');
				PostReq.addParamsById('u_name', 'u_pass', 'u_passconf', 'u_email', 'u_fname', 'u_lname', 'u_phone');
				PostReq.send();
			});

			$('#u_authenticate').click( function() { 
				var PostReq = new Post('authentication.php');
				PostReq.addParamsById('u_name', 'u_pass');
				PostReq.send();
				//sql('add_comment', sender, recipient, rating, body);
				//sql ('get_user_info', sender, verify_login)
			});

		</script>

	</body>
</html>