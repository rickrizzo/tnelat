<!DOCTYPE html>
<html>
<?php
	session_start();
?>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tnelat</title>
	<?php require 'components/css.php'; ?>
</head>
<body>

	<!--Navigation-->
	<?php require 'components/navigation.php'; ?>

	<!--Header-->
	<header>
		<div>
			<h1>tnelat</h1>
			<h4>Find the team you need</h4>
		</div>
	</header>
	
	<!--Actions-->
	<section id="actions">
		<div>
			<img src="resources/review.png" alt="">
			<a class="btn" href="#">Review Teammates</a>
			<article>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis libero blanditiis quo deleniti. Quisquam a esse numquam, nostrum dolorem, cum repellat. Assumenda magnam et non sed voluptatibus, nihil hic tempore.
			</article>
		</div>
		<div>
			<img src="resources/team.png" alt="">
			<a class="btn" href="#">Find Teammates</a>
			<article>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis libero blanditiis quo deleniti. Quisquam a esse numquam, nostrum dolorem, cum repellat. Assumenda magnam et non sed voluptatibus, nihil hic tempore.
			</article>
		</div>
		<div>
			<img src="resources/learn.png" alt="">
			<a class="btn" href="#">Learn More</a>
			<article>
				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officiis libero blanditiis quo deleniti. Quisquam a esse numquam, nostrum dolorem, cum repellat. Assumenda magnam et non sed voluptatibus, nihil hic tempore.
			</article>
		</div>
	</section>

	<!--Footer-->
	<footer>Created by Dan, Deborah, Theo and Rob</footer>

	<!--Resouces-->
	<?php require 'components/scripts.php'; ?>
	<script src="js/frontpage.js"></script>
</body>
</html>