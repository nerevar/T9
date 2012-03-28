<?php

	require_once('classes/tree.php');
	require_once('classes/log.php');

	define('NODE_SIZE', 6);

	/**
	 * Parse string node
	 * @param $node
	 * @return array
	 */
	function extract_node($node) {
		$arr = unpack('L', substr($node,2,4));

		return array(
			$node[0], // letter
			$node[1] == '+' || $node[1] == '*', // last char
			$node[1] == '*' || $node[1] == '/', // last leaf
			$arr[1]
		);
	}

	/**
	 * Filename with serialized tree
	 */
	$filename = 'tree.txt';

	/**
	 * Array of found words for $search digit string
	 */
	$words = array();

	/**
	 * Search digital string
	 */
	$search = (string)intval($_REQUEST['search']);
	$search = str_replace('0', '', $search);

	if (empty($search)) {
		include('templates/results.tpl.php');
		return;
	}

	$fp = fopen($filename, "rb");
	$node = fread($fp, NODE_SIZE); // !

	list($letter, $is_last_char, $is_last_leaf, $limit) = extract_node($node);

	/**
	 * Current tree level (the same as a letter position in $search string)
	 */
	$level = 0;

	/**
	 * Count of children of each level
	 */
	$count_children_total = array('-1' => $limit);
	/**
	 * Count of children on current tree node
	 */
	$count_children_current = array();

	/**
	 * Temporary storage for found letters.
	 */
	$stack = array();

	while(!feof($fp) && $node = fread($fp, NODE_SIZE)) {
		// parse current node
		list($letter, $is_last_char, $is_last_leaf, $count) = extract_node($node);

		// counts of children
		$count_children_total[$level] = $count;
		$count_children_current[$level] = !empty($count_children_current[$level]) ? $count_children_current[$level] + 1 : 1;

		if (in_array($letter, $numbers[$search[$level]])) {
			// found needed letter in tree node

			$stack[$level] = $letter;

			if ($is_last_char && ($level == strlen($search) - 1)) {
				// Bingo! We found word
				$words[] = implode('', $stack);

				// read all remain children of parent node and goto next parent sibling
				fseek($fp, $count * NODE_SIZE, SEEK_CUR);
				$count_children_current[$level] += $count;
				fseek($fp, ($count_children_total[$level-1] - $count_children_current[$level]) * NODE_SIZE, SEEK_CUR);
				$level--;

			} else {
				// found same string for digit $search, but it's not a word
				if ($level == strlen($search) - 1) {

					// read all remain children of parent node and goto next parent sibling
					fseek($fp, $count * NODE_SIZE, SEEK_CUR);
					$count_children_current[$level] += $count;
					fseek($fp, ($count_children_total[$level-1] - $count_children_current[$level]) * NODE_SIZE, SEEK_CUR);
					$level--;
				} else {
					// goto next tree level
					$count_children_current[$level] += $count;
					$level++;
					$count_children_current[$level] = 0;
				}
			}
		} else {
			if ($is_last_leaf) {
				// read all remain children of parent node and goto next parent sibling
				fseek($fp, $count * NODE_SIZE, SEEK_CUR);
				$count_children_current[$level] += $count;
				fseek($fp, ($count_children_total[$level-1] - $count_children_current[$level]) * NODE_SIZE, SEEK_CUR);
				$level--;
			} else {
				// just read next sibling of current node
				fseek($fp, $count * NODE_SIZE, SEEK_CUR);
				$count_children_current[$level] += $count;
			}
		}
	}

	fclose($fp);

	include('templates/results.tpl.php');