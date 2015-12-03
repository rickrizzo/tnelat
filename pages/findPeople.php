<?php
	require '../components/connector.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>Find People</title>
	<?php include '../components/css.php'; ?>
</head>
<body>
	<!--Navigation Bar-->
	<?php include '../components/navigation.php'; ?>

	<!--Main-->
	<h1 class="jumbotron"></h1>
	<section id="display">
	<?php
		$dbname = 'tnelat';
   		$dbconn = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $password);		
   		$sql = 'SELECT UID, first_name, last_name FROM users';	
   		$result = $dbconn->query($sql);
 		$result->setFetchMode(PDO::FETCH_NUM);
		while($row = $result->fetch())
		{
			echo '<div>';
			echo '<a href="/tnelat/user/' . $row[0] . '">' . $row[1] . ' ' . $row[2] . '</p>';
			echo '</div>';
		}
	?>
	</section>
	<!--JavaScript-->
	<?php include '../components/scripts.php'; ?>
</body>
</html>
