<?php
	//Clear session cookies to log out user
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		session_start();
		$_SESSION = array();

		$_SESSION['username'] = '';
		$_SESSION['UID'] = '';

		// If it's desired to kill the session, also delete the session cookie
		if (ini_get("session.use_cookies")) {
		    $params = session_get_cookie_params();
		    setcookie(session_name(), '', time() - 42000,
		        $params["path"], $params["domain"],
		        $params["secure"], $params["httponly"]
		    );
		}

		// Finally, destroy the session.
		session_destroy();
			echo ('Logged out successfully');
 	}
?>