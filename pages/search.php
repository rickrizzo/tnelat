<!--Search Page-->
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
		
		<!--Sort Results-->
		<section>
			<h3 class='search_header'>Sort by:</p>
			<select id='sort_by' name='sort_by'>
				<option value='first_name'>First Name</option>
				<option value='last_name'>Last Name</option>
				<option value='username'>Username</option>
				<option value='rating'>Rating</option>
			</select>

		<!--Order of Results-->
			<select id='order' name='order'>
				<option value='DESC'>Descending</option>
				<option value='ASC'>Ascending</option>
			</select>
		</section>
		<input type='button' value='Search' id='submit'>
	</menu>
	<!--Display search results-->
	<section id='search_results'></section>
</main>

<!--Search Script-->
<script type="text/javascript" src="js/search.js"></script>