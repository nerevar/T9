<pre>
<?php

require_once('tree.php');

if (!function_exists('d')) {
	/**
	 * Выводит информацию о переменной
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

if (!function_exists('dp')) {
	/**
	 * Выводит информацию о переменной
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

	function dp_sym($tree, $spaces) {
		print $spaces;
		if ($tree->last) print "<b>";
		print $tree->letter;
		if ($tree->last) print "</b>";
		print "\n";
		if (!empty($tree->children)) {
			$spaces = '|-' . $spaces;
			foreach ($tree->children as $child) {
				dp_sym($child, $spaces);
			}
		}
	}
}

/**
 * Парсит строковую ноду
 * @param $node
 * @return array
 */
function extract_node($node) {
	$arr = unpack('L', substr($node,2,4));

	return array(
		$node[0],
		$node[1] == '+',
		$arr[1]
	);
}

define('NODE_SIZE', 6);

$filename = 'tree_b.txt';

$search = 'against';
//$search = 'number';

$pointer = 0;

$fp = fopen($filename, "rb");
$node = fread($fp, NODE_SIZE); // !
$pointer += NODE_SIZE;

list($letter, $is_last, $total) = extract_node($node);

$is_found_letter = FALSE;

$letter_position = 0;

while(!feof($fp) && $node = fread($fp, NODE_SIZE)) {
	$pointer += NODE_SIZE;
	list($letter, $is_last, $count) = extract_node($node);

	if ($letter == $search[$letter_position]) {
		$is_found_letter = TRUE;
		$letter_position++;

		print ' <b>'.$letter . '</b> ';

		if ($letter_position == strlen($search)) {
			print 'Bingo!';
			break;
		}

	} else {
		print ' '.$letter . ' ';
		fseek($fp, $count * NODE_SIZE, SEEK_CUR);
	}
}

fclose($fp);