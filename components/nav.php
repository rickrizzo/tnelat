<nav class="pagewidth">
	<ul>
		<li class='float-left'>
			<a href="/tnelat" class="navlink bold">tnelat</a>
		</li>
		<?php
			//If Logged In
			if(isset($_SESSION['session_id'])) {
				echo '<li class="float-left"><a href="/tnelat?src=search" class="navlink small" id="profile">search</a></li>';
				echo '<li class="float-right"><a href="#" class="navlink small" id="logout">logout</a></li>';
				echo '<li class="float-right"><a href="/tnelat?src=profile&UID=' . $_SESSION['UID'] . '" class="navlink small" id="profile">' . $_SESSION['username'] . '</a></li>';
			}
			//If Not Logged In
			else {
<<<<<<< HEAD
				echo '<li class="float-right"><a href="/tnelat?src=login" class="navlink small">login</a></li>';
				echo '<li class="float-right"><a href="/tnelat?src=signup" class="navlink small">signup</a></li>';
=======
				echo '<li class="float-right"><a href="/tnelat/pages/login.php" class="navlink small">login</a></li>';
				echo '<li class="float-right"><a href="/tnelat/pages/signup.php" class="navlink small">signup</a></li>';
>>>>>>> DansBranch
			}
		?>
	</ul>
</nav>

<!--Scripts-->
<script type="text/javascript" src="js/logout.js"></script>