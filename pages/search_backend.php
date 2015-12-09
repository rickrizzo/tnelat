<?php
  try {
      $user = 'root';
      $password = '';
      // connect to the database
      $dbconn = new PDO('mysql:host=localhost;dbname=tnelat;',$user, $password);
      $dbconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
  catch (Exception $e) 
  {
    echo "Error: " . $e->getMessage();
  }
  if (isset($_GET['name']))
  {
    // trim whitespace from head and tail from input text
    $searchTerms = trim($_GET['name']);

    // select usernames, first names, and last names to display. CONCAT so the query
    // works with a full name, only a first name, or only a last name.
    $searchSQL = "SELECT username, first_name, last_name FROM Users WHERE CONCAT(firstname, ' ', lastname) LIKE :search OR username LIKE :search";
    
    $prepared = $dbconn->prepare($searchSQL);
    // bind the serach input to the query
    $prepared->bindValue(':search', '%'. $searchTerms . '%', PDO::PARAM_STR);
    $prepared->execute();
    
    if ($prepared->rowCount() > 0) 
    { 
      $result = $prepared->fetchAll();

      foreach( $result as $row ) 
      {
        echo $row["username"] . '</br>';
        echo $row["first_name"] . '</br>';
        echo $row["last_name"] . '</br>';
      }
    } 
    else 
    {
      echo 'There is nothing to show';
    }
  }
?>
<!DOCTYPE  HTML> 
<html> 
  <head>  
    <meta  charset="utf-8"> 
      <title>Find People</title> 
  </head>  
  <body> 
    <h3>Search Members</h3> 
    <p>You may search by name or username!</p> 
    <!--Form-->
    <form  method="GET" action="search_backend.php"  name="searchForm"> 
      <input  type="text" name="name"> 
      <input  type="submit" name="submit" value="Search"> 
    </form> 
  </body> 
</html> 
