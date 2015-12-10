<main class='pagewidth login'>
	<menu class='search_menu'>
	  <h2>User Search</h2>
	  	<section>
		  	<h3>Search by:<h3>
			<select id='search_by' name='search_by'>
				<option value='all'>All</option>
				<option value='first_name'>First Name</option>
				<option value='last_name'>Last Name</option>
				<option value='username'>Username</option>
			</select>
			<input type='text' placeholder='' id='search_term' name='search_term'>
		</section>

		<section>
			<h3 class='search_header'>Sort by:</p>
			<select id='sort_by' name='sort_by'>
				<option value='first_name'>First Name</option>
				<option value='last_name'>Last Name</option>
				<option value='username'>Username</option>
				<option value='rating'>Rating</option>
			</select>

			<select id='order' name='order'>
				<option value='ASC'>Ascending</option>
				<option value='DESC'>Descending</option>
			</select>
		</section>
		<input type='button' value='Search' id='submit'>
	</menu>

	<section id='search_results'></section>
</main>

<script type="text/javascript" src="js/search.js"></script>