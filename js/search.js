$(document).ready(function() {
	search = $('#search_by');
	search.change(function() {
		if (search[0].options[search[0].selectedIndex].value == 'all') {
			$('#search_term').attr('disabled', 'disabled');
			$('#search_term')[0].style.backgroundColor = '#D3D3D3';
			$('#search_term')[0].value = '';
		}
		else {
			$('#search_term').attr('disabled', 'enabled');
			$('#search_term')[0].style.backgroundColor = '#FFFFFF';
		}
	});

	$('#submit').click(function() {
		PostReq = new Post('handlers/search_engine.php');
		PostReq.addParamsById('search_by', 'search_term', 'sort_by', 'order');
		PostReq.set_callback(function(val) {
			$('#search_results').html(val);
		});
		PostReq.send();
	});
});