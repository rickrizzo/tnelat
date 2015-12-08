$('#loginsubmit').click(function() {
    var PostReq = new Post('/tnelat/dan/authentication.php');
    PostReq.addParamsById('username', 'password');
    PostReq.set_callback( function(val) {
      if (val == 'SUCCESS')
        parent.window.location.reload();
      else
        $('#response').html(val);   
    });
    PostReq.send();     
});