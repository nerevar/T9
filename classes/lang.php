<?php
	/**
	 * Current site language. Default value
	 */
	$lang = 'en';

	// check user-changed language in cookie
	$allowed_languages = array('en', 'ru');
	if (!empty($_COOKIE['lang'])) {
		$cookie_lang = strtolower($_COOKIE['lang']);
		if (in_array($cookie_lang, $allowed_languages)) {
			$lang = $cookie_lang;
		}
	}