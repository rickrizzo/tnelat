<nav class="pagewidth">
	<ul>
		<li class='float-left'>
			<a href="/tnelat" class="navlink bold">tnelat</a>
		</li>

		<?php
			if(isset($_SESSION['session_id'])) {
				echo '<li class="float-left"><a href="#" class="navlink small" id="profile">search</a></li>';
				echo '<li class="float-right"><a href="#" class="navlink small" id="logout">logout</a></li>';
				echo '<li class="float-right"><a href="/tnelat/pages/profile.php?UID=' . $_SESSION['UID'] . '" class="navlink small" id="profile">' . $_SESSION['username'] . '</a></li>';
			}
			else {
				echo '<li class="float-right"><a href="pages/login.php" class="navlink small">login</a></li>';
				echo '<li class="float-right"><a href="pages/signup.php" class="navlink small">signup</a></li>';
			}
		?>
	</ul>
</nav>

<script>
	$('#logout').click( function() {
		var PostReq = new Post('/tnelat/dan/logout.php');
		PostReq.set_callback( function () {
			window.location.replace('/tnelat/') 
		}); 
		PostReq.send();
	});
</script>