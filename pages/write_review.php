<?php
  //include 'connector.php';
  //echo "Let's start!";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<?php include '../components/css.php'; ?>
</head>
<body id="writepage">
	<!--Navigation Bar-->
	<?php include '../components/navigation.php'; ?>

	<!--About-->
	<div class="container" style="background: #EE4B3E; margin-top: 50px">
		<font color="white"> <h2>Reviews</h2>
		<p>Reviews are the heart of tnelat. Write an honest review that will help future peers. </p>
	</p></div> </font>

	<!--Form-->
	<div class="container" style="background: #EE4B3E">
	<form id="myForm" action="/Project/tnelat-master%20(1)/tnelat-master/pages/writeReview.php">
		<fieldset>

  <input type='text' name='name' id='name' placeholder="Your Name" /> <p>
  
</p>
 

 <input type='text' name='email' id='email' placeholder="Peer Being Reviewed" /><br><br>
<textarea class="form-control" rows="10" placeholder="Write a review..."></textarea> <br>
<p class="submit"><input type="submit" name="commit" value="Submit Review"> </p>

<br />
 </fieldset>

</form>

</head>
<body>

 

 
<script>
function myFunction() {
    document.getElementById("myForm").submit();
}
</script>
	
 
	<!--Resouces-->
	<?php include '../components/scripts.php'; ?>

</body>

</html>
