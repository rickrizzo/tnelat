<?php
	//Handles search requestss
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/SQL_Operation.php';
	require_once  $_SERVER['DOCUMENT_ROOT'] . '/tnelat/components/formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		$vars = process_request($_POST);
		$request = null;

		//Check terms
		if ($vars['search_by'] != 'all' and $vars['search_term'] == '')
			exit('<p class="error">Please enter a search term</p>');

		//Handle variations
		switch($vars['search_by']) {
			case('all'):
				$request = new GetAllUsers();
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

		//Organize Results
		if ($vars['sort_by'] != 'rating') {
			$sort = $vars['sort_by'] . ' ' . strtoupper($vars['order']);
			$request->order_by($sort);
			$sorted_users = $request->execute();
		}
		else {
			$users = $request->execute();
			$sorted_indices = [];
			foreach($users as $index=>$user) {
				$sorted_indices[$index] = (new GetAverageRating($user['UID']))->execute()[0][0];
			}
			asort($sorted_indices);

			$sorted_users = [];
			foreach($sorted_indices as $index=>$rating) {
				$sorted_users[] = $users[$index];
			}

			if (strtoupper($vars['order'] == 'asc'))
				$sorted_users = array_reverse($sorted_users);
		}

		foreach (array_reverse($sorted_users) as $user) {
		     profile_bar($user, '/tnelat?src=profile&UID=' . $user['UID']);
		}
	}
?>