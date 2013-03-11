<?php
	require_once('classes/lang.php');

	$action = 'index';

	if (!empty($_GET['q'])) {
		$action = $_GET['q'];
	}

	include("templates/{$lang}/header.tpl.php");

	switch ($action) {
		case 'about':
			include("templates/{$lang}/about.tpl.php");
			break;
		case 'details':
			include("templates/{$lang}/details.tpl.php");
			break;
		default:
			include("templates/{$lang}/index.tpl.php");
			break;
	}