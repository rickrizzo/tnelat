<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/page_resources.php"; ?>
</head>
<body>
	<!--Navigation Bar-->
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>

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
				<textarea name="body" id="review_body" cols="100" rows="10" placeholder="Write review here..." required></textarea>
			</fieldset>

			<!--Catagory-->
			<fieldset>
				<legend>Catagory</legend>
				<p>Catagorize the capacity in which you worked with this person</p>
				<select name="category" id="category" required>
					<option selected="selected"></option>
					<option value="coding">Coding</option>
					<option value="design">Design</option>
					<option value="database">Database</option>
					<option value="business">Business</option>
				</select>
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

			//Catch errors
			if(emoji == undefined) {
				alert("Please pick an emoji");
				return;
			}
			if($("#review_body").val() == "") {
				alert("Please write a review");
				return;
			}

			//Post parameters
			PostReq.addParamByPair('account', <?php echo $id; ?>);
			PostReq.addParamByPair('author', <?php echo $_SESSION['UID']; ?>);
			PostReq.addParamByPair('emoji', emoji);
			PostReq.addParamById('review_body');
			
			//Submit and redirect
			PostReq.send();
			parent.window.location.replace('/tnelat/pages/profile.php?UID=' + <?php echo $id ?>);
		});
	</script>

</body>
</html>