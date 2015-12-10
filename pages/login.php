<?php
  if (!empty($_SESSION['session_id']))
    header('Location: /tnelat');
?>
<!--Login HTML Form-->
<section id="login" class="pagewidth">
  <h2 class='small_header'>Login</h2>
  <h4 class='small_header'>Don't have an account?&nbsp;&nbsp;<a href="/tnelat?src=signup" class='bold'><span>Sign up here</span></a></h4>
  <span id='response'></span>
  <fieldset>
    <input id="username" type="text" name="username" value="" placeholder="Username or Email">
    <input id="password" type="password" name="password" value="" placeholder="Password">
    <span class="btn" id="loginsubmit" value="Login">Submit</span>
  </fieldset>
</section>
