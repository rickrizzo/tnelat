<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?php include '../components/css.php'; ?>

	  <!--Navigation Bar-->
  	<?php include '../components/navigation.php'; ?>

  	<!--About-->
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
   
    <style>
    label {
      display: inline-block; width: 5em;
    }
    .container{
      color:white;
      padding-left: 40px;
    }
    .log {
      margin-left: auto; 
      margin-right: auto; 
      margin-top: 150px; 
      padding: 1px;
      width: 70%;
      background-color: #EE4B3E;
      border-radius: 5px;
      -webkit-box-shadow: 0 2px 3px 2px rgba(0,0,0,0.6);
    }
    .center {
      margin-left: auto; 
      margin-right: auto; 
      width: 70%;
    }
    td {
      text-align: left;
      width: 100%;
    }
    tr {
      width: 100%;
    }

    fieldset div {
      margin-bottom: 2em;
    }
    fieldset .help {
      display: inline-block;
    }
    .ui-tooltip {
      width: 210px;
    }
    .user_small {
      vertical-align: top;
    }
    .profile_picture {
      padding: 15px;
      height: 150px;
      width: 150px;
      display: inline-block;
    }
    hr {
      padding: 0px;
      margin: 0px;
    }
    </style>

    <script>
      $(function() {
        var tooltips = $( "[title]" ).tooltip({
          position: {
            my: "left top",
            at: "right+5 top-5"
          }
        }); 
      });
    </script>
  </head>

  <body>
   
    <section class= "log" method="post">
      <div class="container">
        <h2>Users</h2>
      </div>
    </section>

    <table background-color='white' class='center'>
      <?php
        include 'SQL_Operation.php';
        $users = (new GetNextUsers(10))->execute();
        foreach ($users as $user) {
          echo ('<tr><td class="user_small">
                    <img src=https://lh3.googleusercontent.com/-mLGBxfgzyHI/AAAAAAAAAAI/AAAAAAAAADg/00zpJ3q4oL0/s120-c/photo.jpg" class="profile_picture">
                    <div style="display: inline-block; vertical-align: top; padding-top: 40pxdp">
                      <a href="../user/' . $user['UID'] . '" style="display: inline-block;"><b>' . $user['username'] . '</b></a></br>
                      <div style="display: inline-block;">' . $user['first_name'] . ' ' . $user['last_name'] . '</div></br>
                      <div style="display: inline-block;">' . $user['email'] . '</div>
                    </div>
                    <hr>
                </td></tr>'); 
        }
      ?>
    </table>

  	<!--Resouces-->
  	<?php include '../components/scripts.php'; ?>

  </body>
</html>
