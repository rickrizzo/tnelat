//Clear session
$('#logout').click( function() {
  console.log("LOGGING OUT");
  var PostReq = new Post('/tnelat/handlers/logout.php');
  PostReq.set_callback( function () {
    window.location.replace('/tnelat') 
  }); 
  PostReq.send();
});