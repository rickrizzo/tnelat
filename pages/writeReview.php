<!--Submit review about user-->
<?php
	$user = (new GetUser($_GET['UID']))->execute()[0];
	$reviews = (new GetReviewsAbout($_GET['UID']))->execute();

    $written_already = false;
    foreach($reviews as $review) {          
      if ($review['authorUID'] == $_SESSION['UID']) {
        $written_already = true;
        break;
      }
    }
    if ($written_already) {
    	header('Location: /tnelat/?src=profile&UID=' . $_GET['UID']);
    }
?>

<main id="login" class="pagewidth">
<!--New Review-->
	<h2 class='small_header'>Review for <?php echo(ucfirst($user['first_name']) . ' ' . ucfirst($user['last_name'])); ?> </h2>

	<!--Category-->
	<fieldset>
		<p>Which best describes the work this person did?</p>
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
		<p>Describe your experience with this person:</p>
		<textarea name="body" id="review_body" cols="100" rows="10" placeholder="Write review here..." required></textarea>
	</fieldset>

	<!--Stars-->
	<fieldset>
		<p>Rank this person on a scale of one to five stars:</p>
		<select name="rating" id="rating" required>
			<option selected="selected"></option>
			<option value="1">1 Star</option>
			<option value="2">2 Stars</option>
			<option value="3">3 Stars</option>
			<option value="4">4 Stars</option>
			<option value="5">5 Stars</option>
		</select>
	</fieldset>

	<!--Select Emoji-->
	<fieldset id="emoji_select" style='margin-bottom: 30px;'>
		<p>Add a descriptive emoji</p>
		<ul></ul>
	</fieldset>

	<!--Submit Button-->
	<a href="#" id="submit" class="btn">Submit</a>

</main>

<!--Resources-->
<script>
$('#submit').click( function() {
	var PostReq = new Post('/tnelat/handlers/write_review.php');
	var emoji = $('input[name=emoji]:checked').val();

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

	<?php echo $user['UID'] ?>

	PostReq.addParamByPair('account', <?php echo $user['UID']; ?>);
	PostReq.addParamByPair('author', <?php echo $_SESSION['UID']; ?>);
	PostReq.addParamByPair('emoji', emoji);

	var rating = document.getElementById("rating");
	rating = rating.options[rating.selectedIndex].value;
	PostReq.addParamByPair('rating', rating);

	var category = document.getElementById("category");
	category = category.options[category.selectedIndex].value;
	PostReq.addParamByPair('category', category);

	PostReq.addParamById('review_body');
	
	PostReq.set_callback(function () { parent.window.location.reload(); });

	//Submit and redirect
	PostReq.send();
});
</script>
