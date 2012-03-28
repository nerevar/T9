<?php

if (!function_exists('d')) {
	/**
	 * Shows variable value
	 * @param object $var
	 * @return
	 */
	function d($var, $exit = FALSE) {
		print "<pre>" . print_r($var, TRUE) . "</pre>" . "\n";

		if ($exit) {
			die;
		}
	}
}

/**
 * Shows html tree
 * @param object $var
 * @return
 */
function dp($var, $exit = FALSE) {
	print "<pre class='tree'>";
		dp_sym($var, '');
	print "</pre>";

	if ($exit) {
		die;
	}
}

/**
 * Sub-function. Recursively prints tree nodes
 * @param $tree
 * @param $spaces
 */
function dp_sym($tree, $spaces) {
	print $spaces;
	if ($tree->last) print "<b>";
	print $tree->letter;
	if ($tree->last) print "</b>";
	print "\n";
	if (!empty($tree->children)) {
		$spaces = '  ' . $spaces;
		foreach ($tree->children as $child) {
			dp_sym($child, $spaces);
		}
	}
}