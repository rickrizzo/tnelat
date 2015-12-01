<?php
  //include 'connector.php';
  //echo "Let's start!";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include '../components/css.php'; ?>
</head>
<body>
	<!--Navigation Bar-->
	<?php include '../components/navigation.php'; ?>

	<!--Review-->
	<main>
		<!--Jumbotron-->
		<div class="jumbotron pagewidth">
		  <h1>New Review</h1>
		</div>

		<!--New Review-->
		<form action="" class="pagewidth">
			<!--Basic Information-->
			<fieldset>
				<legend>Basic Information</legend>
				Name: <input type="text">
			</fieldset>
			<fieldset>
				<legend>Ratings</legend>
				<p>Pick the emoji that describes your experience with this teamamte</p>
				😍🙌😃😊😳😒😔😓😖😭😡
			</fieldset>
			<fieldset>
				<legend>Your Review</legend>
			</fieldset>
		</form>
	</main>

	<!--Resouces-->
	<?php include '../components/scripts.php'; ?>
</body>
</html>
