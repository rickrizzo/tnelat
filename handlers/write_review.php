<?php
	//Create review SQL Operation
	include '../components/SQL_Operation.php';
	include '../components/formatting.php';
	session_start();

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		if (!isset($_SESSION['UID'])) {
				echo ($_SESSION);
				echo 'You must be logged in to post a review.';
				exit;
		}

		$vars = process_request($_POST);

		$review = (new AddReview($vars['author'], $vars['account'], $vars['category'], $_POST['body'], $vars['rating'], $vars['emoji']))->execute();
		echo('Review submitted');
	}
?>