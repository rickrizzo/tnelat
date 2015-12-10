<?php
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/SQL_Operation.php';
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);

		$sort = $vars['sort_by'] . ' ' . strtoupper($vars['order']);
		$request = null;


		if ($vars['search_by'] != 'all' and $vars['search_term'] == '')
			exit('<p class="error">Please enter a search term</p>');


		switch($vars['search_by']) {
			case('all'):
				$request = new GetUsers();
				break;
			case('first_name'):
				$request = new GetUsersLikeFirstName($vars['search_term']);
				break;
			case('last_name'):
				$request = new GetUsersLikeLastName($vars['search_term']);
				break;
			case('username'):
				$request = new GetUsersLikeUsername($vars['search_term']);
				break;
		}

		$request->order_by($sort);
		$users = $request->execute();
   	
   	foreach (array_reverse($users) as $user) {
      profile_bar($user, '/tnelat?src=profile&UID=' . $user['UID']);
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