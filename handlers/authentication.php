<?php
	require_once '../components/SQL_Operation.php';
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		//$vars = process_request($_POST);

		if(!empty($user = (new GetUserByUsername($_POST['username']))->execute())) {
			$user = $user[0];
		}
		elseif (!empty($user = (new GetUserByEmail($_POST['username']))->execute())) {
			$user = $user[0];
		}
		else {
			echo ("\n<span class='error'>Invalid username or password</span>");
			exit;
		}

		// Salt the password
		$salted_password = hash('sha256', $user['salt'] . $_POST['password']);

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
		echo ('Logged in successfully</br>');
	}
?>