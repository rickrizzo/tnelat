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
?>