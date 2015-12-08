<?php
	include '../components/SQL_Operation.php';
	include '../components/formatting.php';
	session_start();

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		if (!isset($_SESSION['UID'])) {
				echo ($_SESSION);
				echo 'You must be logged in to post a review.';
				exit;
		}

		//Error Handling
		$vars = process_request($_POST);

		if($vars['emoji'] == 'undefined' || $vars['body'] == '') {
			echo("Error: Please fill out all fields");
		} else {
			$review = (new AddReview($vars['author'], $vars['account'], $vars['emoji'], $vars['body'])/*, $vars['category']*/)->execute();
			echo('Review submitted');
		}
	}
?>