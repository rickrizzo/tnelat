function disable_term() {
	$('#search_term').attr('disabled', 'disabled');
	$('#search_term')[0].style.backgroundColor = '#D3D3D3';
	$('#search_term')[0].value = '';
}

function enable_term() {
	$('#search_term').attr('disabled', false);
	$('#search_term')[0].style.backgroundColor = '#FFFFFF';
}

$('#submit').click(function() {
	PostReq = new Post('handlers/search_engine.php');
	PostReq.addParamsById('search_by', 'search_term', 'sort_by', 'order');
	PostReq.set_callback(function(val) {
		$('#search_results').html(val);
	});
	PostReq.send();
});

$(document).ready(function() {
	search = $('#search_by');
	disable_term();

	//Disable Fields
	search.change(function() {
		if (search[0].options[search[0].selectedIndex].value == 'all') {
			disable_term();
		}
		else {
			enable_term();
		}
	});

	$('#submit').trigger('click');
});