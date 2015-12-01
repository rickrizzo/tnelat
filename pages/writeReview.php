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
		<form action="" class="pagewidth">
			<!--Select Person-->
			<fieldset id="person">
				<legend>Person</legend>
				<input type="text">
			</fieldset>

			<!--Select Skills-->
			<fieldset id="skills">
				<legend>Skills</legend>
			</fieldset>

			<!--Select Emoji-->
			<fieldset id="rating">
				<legend>Vibe</legend>
				
				<!--Emoji List-->
				<ul>
					<li><span class="emoji">😍</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">🙌</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😃</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😊</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😳</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😒</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😔</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😓</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😖</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😭</span><p><input type="radio" name="emoji"></p></li>
					<li><span class="emoji">😡</span><p><input type="radio" name="emoji"></p></li>
				</ul>

			</fieldset>
			<fieldset>
				<legend>Your Review</legend>
				<p>Why did you choose this emoji?</p>
				<textarea name="" id="" cols="100" rows="10"></textarea>
			</fieldset>
		</form>
	</main>

	<!--Resouces-->
	<?php include 'components/scripts.php'; ?>
	<script src="js/review.js"></script>
</body>
</html>
