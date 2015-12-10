$('#submitReview').click( function() {
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
  //PostReq.addParamById('category');
  
  //Submit and redirect
  PostReq.send();
  parent.window.location.replace('/tnelat/pages/profile.php?UID=' + <?php echo $id ?>);
});