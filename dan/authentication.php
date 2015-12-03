<?php
	include 'SQL_Operation.php';
	include 'formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);
		$user = (new GetUserByUsername($vars['username']))->execute();

		// Salt the password
		$salted_password = hash('sha256', $user['salt'] . $vars['password']);

		if ($salted_password == $user['password']) {
			session_start();
			$_SESSION['id'] = $vars['username'] . time();
			header("Location: test.html");
		}
		else {
			echo ("\nInvalid username or password");
		}
	}
?>