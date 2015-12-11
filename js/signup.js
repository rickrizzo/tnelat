//Send user information to server
$('#submitUser').click(function() {
  var PostReq = new Post('/tnelat/handlers/create_account.php');
  PostReq.addParamsById('username', 'password', 'password_confirm', 'first_name', 'last_name', 'email', 'phone');
  PostReq.set_callback( function(val) {
    $('#response').html(val);
    if(val.indexOf("successful") != -1) {
      parent.window.location.reload();
    }
  });
  PostReq.send();     
});