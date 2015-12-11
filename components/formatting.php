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
		# Get Name
		$name = ucfirst($user_object['first_name']) . "&nbsp;&nbsp;" . ucfirst($user_object['last_name']);
		
		# Get Average Rating
		$rating = (new GetAverageRating($user_object['UID']))->execute()[0][0];
		if (!$rating)
			$rating = 0;
		$rating_str = sprintf('%0.1f', round($rating, 1));

		# Constrcut Stars
		$stars = '';
		for ($i = 0; $i < 5; $i++) {
			if ($i < $rating) {
				$stars .= '<img src="resources/filled_star.png">';
			}
			else {
				$stars .= '<img src="resources/empty_star.png">';
			}
		}

		# Get Profile Picture
		$profile_picture = "/tnelat/data/profile_pictures/" . $user_object['UID'];

		if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $profile_picture))
			$profile_picture = "/tnelat/resources/no_image.jpg";

		$element = '';
		if (isset($link)) {
			$element = '
				<article>
					<a class="profile profile_link" href="' . $link . ' ">
						<img height="100px" width="100px" class="profile_pic" src="' . $profile_picture . '">
						<span class="user_details">
							<h2 class="jumbotron">' . ucfirst($name) . '</h2>
							<h4>' . ucfirst($user_object['username']) . '</h4>
							<h4>' . $user_object['email'] .  '</h4>
						</span>
						<span id="account_details">
							<div id="stars" style="float: right; margin-left: 5px;">(' . $rating_str . ')</div>' .
							$stars	.
						'</span>
					</a>
				</article>
			';
		}
		else {
			$element = '
				<article>
					<section class="profile profile_static">
						<img height="100px" width="100px" class="profile_pic" src="' . $profile_picture . '">
						<span class="user_details">
							<h2 class="jumbotron">' . ucfirst($name) . '</h2>
							<h4>' . ucfirst($user_object['username']) . '</h4>
							<h4><a href="mailto:' . $user_object['email'] .  '">' . $user_object['email'] . '</a></h4>
						</span>
						<span id="account_details">
							<div id="stars" style="float: right; margin-left: 5px;">(' . $rating_str . ')</div>' .
							$stars	.
						'</span>
					</section>
				</article>
			';
		}
		echo($element);
	}

	function review_bar($review_obj) {
		$details = '<article class="review"><span class="review_details">';			

		if ($review_obj['emoji'] != 0) {
			$details .= '<span class="emoji_detail" id="' . $review_obj["emoji"] . '"></span>';
		}
		for ($i = 4; $i >= 0; $i--) {
			if ($i < $review_obj['rating']) {
				$details .= '<img src="resources/filled_star.png">';
			}
			else {
				$details .= '<img src="resources/empty_star.png">';
			}
		}

		$details .= '<span class="category">' . ucfirst($review_obj['category']) . '</span>';

		//Admin Features
		if (count($admin = (new GetUser($_SESSION['UID']))->execute()) > 0) {
    	$admin = $admin[0]['admin'];
  	}	
  	if($admin == 1) {
  		$details .= "<button id='deleteReview' value='" . $review_obj['RID'] . "'>Delete</button>";
  	}
		$details .= '</span>';

		$details .= '
			<p class="review_body">' .
				$review_obj['body'] .
			'</p>
		';

		$details .= '</article>';

		echo($details);
	}
?>