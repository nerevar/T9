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
			($node[1] == '+' || $node[1] == '*') ? 1 : 0, // last char
			($node[1] == '*' || $node[1] == '/') ? 1 : 0, // last leaf
			$arr[1]
		);
	}

	/**
	 * Filename with serialized tree
	 */
	$filenames = array(
		'ru' => 'tree_ru.txt',
		'en' => 'tree_en.txt',
	);

	/**
	 * Array of found words for $search digit string
	 */
	$words = array();

	/**
	 * Search digital string
	 */
	$search_string = preg_replace('#[^\d]+#i', '', !empty($_REQUEST['search']) ? $_REQUEST['search'] : '');

	// split to several words by 0 or 1 (space characters)
	$search_words = preg_split('#[01]+#iu', $search_string);

	// remove empty values from array
	$search_words = array_filter($search_words, 'strlen');

	if (empty($search_words)) {
		include('templates/results.tpl.php');
		return;
	}

	foreach ($search_words as $search) {

		foreach ($filenames as $lang => $filename) {

			// clears array of words
			$words[$lang][$search] = array();

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

				if (in_array($letter, $numbers[$lang][$search[$level]])) {
					// found needed letter in tree node

					if ($is_last_char && ($level == strlen($search) - 1)) {

						$stack[$level] = $letter;

						// Bingo! We found word
						$word = implode('', $stack);

						// convert from source 1251 to output utf-8 encoding
						if ($lang == 'ru') {
							$word = iconv('windows-1251', 'utf-8', $word);
						}
						$words[$lang][$search][] = $word;

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

							$stack[$level] = $letter;

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

				// go down to root of tree
				while ($level > 0 && $count_children_total[$level-1] - $count_children_current[$level] == 0) {
					$level--;
				}
			}

			fclose($fp);

		}
	}

	include('templates/results.tpl.php');