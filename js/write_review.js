//Submit Review to server
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
	PostReq.addParamByPair('account', <?php echo $user['UID']; ?>);
	PostReq.addParamByPair('author', <?php echo $_SESSION['UID']; ?>);
	PostReq.addParamByPair('emoji', emoji);

	var rating = $("#");
	rating = rating.options[rating.selectedIndex].value;

	PostReq.addParamByPair('rating', rating)
	PostReq.addParamById('review_body');
	
	//Submit and redirect
	PostReq.send();
});