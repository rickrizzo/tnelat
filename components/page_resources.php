<?php
	if (session_status() != PHP_SESSION_ACTIVE)
		session_start();

	$SQL_Operation = $_SERVER['DOCUMENT_ROOT'] . '/tnelat/dan/SQL_Operation.php';
	$formatting = $_SERVER['DOCUMENT_ROOT'] . '/tnelat/dan/formatting.php';

	require_once $SQL_Operation;
	require_once $formatting;
?>

<!-- Set up base path for HTML elements -->
<base href="http://docs.websys/tnelat/">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src='/tnelat/dan/Post.js'></script>

<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/tnelat/css/stylesheet.css">


