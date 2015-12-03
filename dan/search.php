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
    }
    .log {
      margin-left: auto; 
      margin-right: auto; 
      margin-top: 150px; 
      border: double; 
      width: 80%;
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
        <h2 class="center">User Search</h2>
      </div>
    </section>

    <table background-color='white'>
      <?php
        include 'SQL_Operation.php';
        $users = (new GetNextUsers(10))->execute();
        foreach ($users as $user) {
          var_dump($users);
          exit;
          echo '<tr><td>' . $user['username'] . '</td></tr>'; 
        }
      ?>
    </table>

  	<!--Resouces-->
  	<?php include '../components/scripts.php'; ?>

  </body>
</html>
