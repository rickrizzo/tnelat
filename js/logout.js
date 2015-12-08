$('#logout').click( function() {
  console.log("LOGGING OUT");
  var PostReq = new Post('/tnelat/dan/logout.php');
  PostReq.set_callback( function () {
    window.location.replace('/tnelat') 
  }); 
  PostReq.send();
});