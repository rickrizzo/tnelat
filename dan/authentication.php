<?php
	include 'SQL_Operation.php';
	include 'formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);

		$user = (new GetUserByUsername($vars['username']))->execute()[0];
		var_dump($user);

		// Salt the password
		$salted_password = hash('sha256', $user['salt'] . $vars['password']);

		if ($salted_password == $user['password']) {
			session_start();

			// Initialize session parameters
			$_SESSION['username'] = $user['username'];
 			$_SESSION['session_id'] = $user['username'] . time();
 			$_SESSION['UID'] = $user['UID'];
 			echo ('Logged in successfully');
		}
		else {
			echo ("\nInvalid username or password");
		}
	}
?>