<!DOCTYPE html>
<html>
	<body>

		<h1>Add a user</h1>

		<form>
			Username: <input id='u_name' type='field' name='name'> </input>
			Password: <input id='u_pass' type='field' name='pass'> </input>
			Email: <input id='u_email' type='field' name='email'> </input>
			<input id='u_submit' type='button' value='submit'> </input>
		</form>

		<form>
			Sender: <input id='c_sender' type='field' name='name'> </input>
			Recipient: <input id='c_recipient' type='field' name='pass'> </input>
			Rating: <input id='c_rating' type='field' name='email'> </input>
			Body: <input id='c_body' type='field' name='email'> </input>
			<input id='c_submit' type='button' value='submit'> </input>
		</form>

		<div id='response'></div>

		<?php include 'sql.php'; ?>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		<script src='http.js'></script>
		<script src='login.js'></script>
		<script>



			$('#u_submit').click( function() { 
				var name = $('#u_name').val();
				var pass = $('#u_pass').val();
				var email = $('#u_email').val();
				sql('add_user', name, pass, email);
			});

			$('#c_submit').click( function() { 
				var sender = $('#c_sender').val();
				var recipient = $('#c_recipient').val();
				var rating = $('#c_rating').val();
				var body = $('#c_body').val();
				attempt_login(sender, 'derp')
				//sql('add_comment', sender, recipient, rating, body);
				//sql ('get_user_info', sender, verify_login)
			});

		</script>

	</body>
</html>