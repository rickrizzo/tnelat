//Delete review by review ID
$("#deleteReview").click(function() {
  var PostReq = new Post('/tnelat/handlers/delete_review.php');
  PostReq.addParamByPair('RID', $(this).val());
  PostReq.set_callback(function(val) {
    console.log(val);
    if(val == "SUCCESS") {
      parent.window.location.reload();
    }
  });
  PostReq.send();
});