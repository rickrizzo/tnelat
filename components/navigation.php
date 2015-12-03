<?php
	session_start();
	$_SESSION['username'] = "steven";
?>
<nav class="pagewidth">
	<ul>
		<span>
			<a href="/tnelat"><li id="brand">tnelat</li></a>
			<a href="reviews"><li>Find</li></a>
		</span>
		<span id="right-menu">
			<?php
				if(isset($_SESSION['username'])) {
					echo '<a href="user/' . $_SESSION['username'] . '"><li>' . $_SESSION['username'] . '</li></a>';
				} else {
					echo '<a href="login"><li>Login</li></a>' .
						'<a href="signup"><li>Sign Up</li></a>';
				}
			?>
		</span>
	</ul>
</nav>