<?php
	function process_request($req) {
		$ret = [];
		foreach ($req as $param_name => $param_val) {
			//preg_replace("/[^A-Za-z0-9 ]/", '', $param_name);
			//preg_replace("/[^A-Za-z0-9 ]/", '', $param_val);
			$ret[strtolower($param_name)] = strtolower($param_val);
		}
		return $ret;
	}

	function profile_bar($user_object, $link) {
		$name = ucfirst($user_object['first_name']) . "&nbsp;&nbsp;" . ucfirst($user_object['last_name']);
		$element = '';

		$profile_picture = "/tnelat/data/profile_pictures/" . $user_object['UID'];

		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $profile_picture))
			$profile_picture = "/tnelat/resources/no_image.jpg";

		if (isset($link)) {
			$element = '
				<article>
					<a class="profile profile_link" href="' . $link . ' ">
						<img height="100px" width="100px" class="profile_pic" src="' . $profile_picture . '">
						<span class="details">
							<h2 class="jumbotron">' . $name . '</h2>
							<h4>' . $user_object['username'] . '</h4>
							<h4>' . $user_object['email'] .  '</h4>
						</span>
					</a>
				</article>
			';
		}
		else {
			$element = '
				<article>
					<section class="profile profile_static">
						<img height="100px" width="100px" class="profile_pic" src="' . $profile_picture . '">
						<span class="details">
							<h2 class="jumbotron">' . $name . '</h2>
							<h4>' . $user_object['username'] . '</h4>
							<h4><a href="mailto:' . $user_object['email'] .  '">' . $user_object['email'] . '</a></h4>
						</span>
					</section>
				</article>
			';
		}

		/*	echo ('<section class="profile profile_link">');
		else 
			echo ('<section class="profile>');

		echo(		'<img height="100px" width="100px" class="profile_pic" src="https://lh3.googleusercontent.com/-mLGBxfgzyHI/AAAAAAAAAAI/AAAAAAAAADg/00zpJ3q4oL0/s120-c/photo.jpg">
			  	   	<span class="details">
		                <h2 class="jumbotron">' . $name . '</h2>
		                <h4>' . $user_object['username'] . '</h4>
			            <h4>');
		if (!$link)
			echo ('<a href=mailto:"' . $user_object['email'] . '">');

		echo($user_object['email']);

		if ($link)
			echo('</section>');
		
		echo ('</a></h4></span>');*/
		echo($element);
	}

?>