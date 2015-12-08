<menu>
	<a href="/tnelat">
		<li id="brand">tnelat</li>
	</a>
	
	<?php
		if(isset($_SESSION['username'])) {
			echo 	'<a href="/tnelat/dan/search.php">
						<li>Find</li>
					</a>';
		}
	?>
</menu>