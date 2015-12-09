<?php
  session_start();
?>

<!DOCTYPE html>
<html>
<<<<<<< HEAD
=======
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
>>>>>>> origin/DansBranch

	<head>
	<?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/page_resources.php"; ?>
	</head>
	<body>
		<!--Navigation Bar-->
		<?php include $_SERVER['DOCUMENT_ROOT'] . "/tnelat/components/nav.php"; ?>
		<!--Review-->
		<main id="login" class="pagewidth">
		<!--New Review-->
			<h2 class='small_header'>Review</h2>

			<!--Catagory-->
			<fieldset>
				<h4 class='small_header'>Category</h2>
				<p>Categorize the capacity in which you worked with this person</p>
				<select name="category" id="category" required>
					<option selected="selected"></option>
					<option value="coding">Coding</option>
					<option value="design">Design</option>
					<option value="database">Database</option>
					<option value="business">Business</option>
				</select>
			</fieldset>


			<!--Your Review-->
			<fieldset>
				<h4 class='small_header'>Your Review</h2>
				<p>Describe your experience with this person:</p>
				<textarea name="body" id="review_body" cols="100" rows="10" placeholder="Write review here..." required></textarea>
			</fieldset>

			<!--Stars-->
			<fieldset>
				<h4 class='small_header'>Rating</h2>
				<p>Rank this person on a scale of one to five stars</p>
				<select name="category" id="category" required>
					<option selected="selected"></option>
					<option value="1">1 Star</option>
					<option value="2">2 Stars</option>
					<option value="3">3 Stars</option>
					<option value="4">4 Stars</option>
					<option value="5">5 Stars</option>
				</select>
			</fieldset>

			<!--Select Emoji-->
			<fieldset id="rating">
				<h4 class='small_header'>Emoji</h2>
				<ul></ul>

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
				<textarea name="body" id="review_body" cols="100" rows="10"></textarea>

			</fieldset>

			<!--Submit Button-->
			<a href="#" id="submit" class="btn">Submit</a>

		</main>

		<!--Resources-->

		<script src="/tnelat/js/review.js"></script>
		<script>

			$('#submit').click( function() {
				var PostReq = new Post('/tnelat/dan/write_review.php');
				var emoji = $('input[name=emoji]:checked', '#write_review').val();

				//Catch errors
				/*if(emoji == undefined) {
					alert("Please pick an emoji");
					return;
				}*/
				if(emoji == undefined) {
					emoji = 1;
				}

				if($("#review_body").val() == "") {
					alert("Please write a review");
					return;
				}

				//Post parameters
				PostReq.addParamByPair('account', <?php echo $_GET['UID']; ?>);
				PostReq.addParamByPair('author', <?php echo $_SESSION['UID']; ?>);
				PostReq.addParamByPair('emoji', emoji);

				var rating = $("#");
				rating = rating.options[rating.selectedIndex].value;

				alert(rating);

				PostReq.addParamById('rating', rating)
				PostReq.addParamById('review_body');
				
				//Submit and redirect
				PostReq.send();
				//parent.window.location.replace('/tnelat/pages/profile.php?UID=' + <?php //echo $id ?>);
			});
		</script>
	</body>
=======
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
>>>>>>> origin/DansBranch
</html>