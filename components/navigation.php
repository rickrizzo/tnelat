<nav class="pagewidth">
	<ul>
		<span>
			<a href="/tnelat"><li id="brand">tnelat</li></a>
			<?php
				if(isset($_SESSION['username'])) {
					echo '<a href="/tnelat/user/"><li>Find</li></a>';
				}
			?>
		</span>
		<span id="right-menu">
			<?php
				if(isset($_SESSION['UID'])) {
					echo '<a href="/tnelat/user/' . $_SESSION['UID'] . '"><li>' . $_SESSION['username'] . '</li></a>';
				} else {
					echo '<a href="/tnelat/login"><li>Login</li></a>' .
						'<a href="/tnelat/signup"><li>Sign Up</li></a>';
				}
			?>
		</span>
	</ul>
</nav>