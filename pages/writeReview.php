<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include 'components/css.php'; ?>
</head>
<body>
	<!--Navigation Bar-->
	<?php include 'components/navigation.php'; ?>

	<!--Review-->
	<main>
		<!--Jumbotron-->
		<div class="jumbotron pagewidth">
		  <h1>New Review</h1>
		</div>

		<!--New Review-->
		<form action="api/review" method="post" class="pagewidth" id='write_review'>

			<!--Select Skills-->
			<fieldset id="skills">
				<legend>Skills</legend>
			</fieldset>

			<!--Select Emoji-->
			<fieldset id="rating">
				<legend>Vibe</legend>
				<!--Emoji List-->
				<ul></ul>
			</fieldset>

			<fieldset>
				<legend>Your Review</legend>
				<p>Describe your experience with this person:</p>
				<textarea name="body" id="review_body" cols="100" rows="10"></textarea>
			</fieldset>

			<input type="submit" id="submit">
		</form>
	</main>

	<!--Resources-->
	<?php include 'components/scripts.php'; ?>
	<script src="js/review.js"></script>
	<script>
		$('#submit').click( function() {
			alert($('input[name=emoji]:checked', '#write_review').val());
		});
	</script>

</body>
</html>




