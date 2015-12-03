<?php
	include 'SQL_Operation.php';
	include 'formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		if (!isset($_SESSION['id'])) {
				echo 'You must be logged in to post a review.'
				exit;
		}

		$vars = process_request($_POST);
		$review = (new AddComment($_SESSION['username'], $vars['account'],  ))->execute();
		$echo 'Review submitted'
	}
?>