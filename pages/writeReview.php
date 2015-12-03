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
		<form method="post" class="pagewidth" id='write_review'>

			<!--Select Emoji-->
			<fieldset id="rating">
				<legend>Emoji</legend>
				<ul></ul>
			</fieldset>

			<!--Your Review-->
			<fieldset>
				<legend>Your Review</legend>
				<p>Describe your experience with this person:</p>
				<textarea name="body" id="review_body" cols="100" rows="10"></textarea>
			</fieldset>

			<!--Submit Button-->
			<a href="#" id="submit" class="btn">Submit</a>
		</form>
	</main>

	<!--Resources-->
	<?php include 'components/scripts.php'; ?>

	<script src="/tnelat/js/review.js"></script>
	<script src='/tnelat/dan/Post.js'></script>
	<script>

		$('#submit').click( function() {
			var PostReq = new Post('/tnelat/dan/write_review.php');
			var emoji = $('input[name=emoji]:checked', '#write_review').val();

			PostReq.addParamByPair('account', <?php echo $id; ?>);
			PostReq.addParamByPair('author', <?php echo 1; ?>);
			PostReq.addParamByPair('emoji', emoji);
			PostReq.addParamById('review_body');
			
			PostReq.send();
		});
	</script>

</body>
</html>