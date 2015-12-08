<?php
	include_once 'SQL_Operation.php';
    include_once 'formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);

		if(!empty($user = (new GetUserByUsername($vars['username']))->execute())) {
			$user = $user[0];
		}
		elseif (!empty($user = (new GetUserByEmail($vars['username']))->execute())) {
			$user = $user[0];
		}
		else {
			echo ("\n<span class='error'>Invalid username or password</span>");
			exit;
		}

		// Salt the password
		$salted_password = hash('sha256', $user['salt'] . $vars['password']);

		if ($salted_password == $user['password']) {
			login($user['username']);		
		}
		else {
			echo ("\n<span class='error'>Invalid username or password</span>");
			exit;
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
		echo ('SUCCESS');
	}
?>