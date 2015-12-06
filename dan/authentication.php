<?php
	include_once 'SQL_Operation.php';
    include_once 'formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);

		$user = (new GetUserByUsername($vars['username']))->execute()[0];
		var_dump($user);

		// Salt the password
		$salted_password = hash('sha256', $user['salt'] . $vars['password']);

		if ($salted_password == $user['password']) {
			login($user['username']);		
		}
		else {
			echo ("\nInvalid username or password");
		}
	}

	function login($username) {

		$user = (new GetUserByUsername($username))->execute()[0];

		// Initialize session parameters
		if(session_status() != PHP_SESSION_ACTIVE)
			session_start();
		$_SESSION['username'] = $user['username'];
		$_SESSION['session_id'] = $user['username'] . time();
		$_SESSION['UID'] = $user['UID'];
		echo ('Logged in successfully</br>');
	}
?>