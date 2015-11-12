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

	<!--About-->
	<div class="container">
		<h2>Reviews</h2>
		<p>Reviews are the heart of tnelat. Write an honest review that will help future peers.</p>
	</div>
	
	<!--Form-->
	<div class="container">
		<form action="">
			<fieldset>
				<legend>Section 1</legend>
				<input type="range">
			</fieldset>
			<fieldset>
				<legend>Review</legend>
				<textarea class="form-control" rows="10" placeholder="Write a review..."></textarea>
			</fieldset>
		</form>
	</div>


	<!--Resouces-->
	<?php include '../components/scripts.php'; ?>
</body>
</html>
