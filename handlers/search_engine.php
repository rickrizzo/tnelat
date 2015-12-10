<?php
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/SQL_Operation.php';
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);
		$search_by = $vars['search_by'];
		$search_term = $vars['search_term'];
		$sort_by = $vars['sort_by'];
		$order = $vars['order'];

		$sort = $sort_by . ' ' . strtoupper($order);

		switch($search_by) {
			case('all'):
				$user_request = new GetNextUsers(1000);
				$user_request->order_by($sort);
				$users = $user_request->execute();

   			foreach ($users as $user) {
      		profile_bar($user, '/tnelat?src=profile&UID=' . $user['UID']);
      	}
      	break;
		}

    /*}
    else {
    	echo('no');
    }*/

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