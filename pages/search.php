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
   
    <div class="container">
      <font color="white">
        <h2>User Search</h2>
      </font>
    </div>


    <script src='../dan/Post.js'></script>
    <script>
      function myFunction() {
          document.getElementById("myForm").submit();
      }

      $('#login').click(function() {
          var PostReq = new Post('../dan/authentication.php');
          PostReq.addParamsById('username', 'password');
          PostReq.set_callback( function() {
            parent.window.location.reload();
          });
          PostReq.send();     
      });
    </script>

  	<!--Resouces-->
  	<?php include '../components/scripts.php'; ?>

  </body>
</html>
