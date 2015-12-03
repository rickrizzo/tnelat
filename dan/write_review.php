<?php
	include 'SQL_Operation.php';
	include 'formatting.php';

	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

		if (!isset($_SESSION['id'])) {
				echo 'You must be logged in to post a review.';
				exit;
		}

		$vars = process_request($_POST);

		$authorUID = (new GetUserByUsername($vars['author']))->execute()['UID'];
		$accountUID = (new GetUserByUsername($vars['account']))->execute()['UID'];

		$review = (new AddReview($authorUID, $accountUID, $vars['emoji'], $vars['body']))->execute();
		echo('Review submitted');
	}
?>