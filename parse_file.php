<?php

	require_once('classes/tree.php');
	require_once('classes/log.php');


	/**
	 * Recursively creates tree with children
	 * @param $tree - current level tree node
	 */
	function recurse(&$tree) {
		global $words;

		// for each child
		for ($i = 0; $i < count($tree->children); $i++) {

			$c = '';
			$pos = $tree->children[$i]->from; // position line in input file
			$first_word_part = substr($words[$tree->children[$i]->from], 0, $tree->children[$i]->level + 1);

			while (isset($words[$pos][$tree->children[$i]->level]) && $first_word_part == substr($words[$pos], 0, $tree->children[$i]->level + 1)) {

				// add child
				if (isset($words[$pos][$tree->children[$i]->level + 1]) && $c != $words[$pos][$tree->children[$i]->level + 1]) {
					$c = $words[$pos][$tree->children[$i]->level + 1];

					$tree->children[$i]->addChild($c, $pos);
				}

				// last symbol in word
				if (!isset($words[$pos][$tree->children[$i]->level + 1])) {
					$tree->children[$i]->last = true;
				}

				$pos++;
			}

			// iterate to each children
			recurse($tree->children[$i]);
		}
	}

	/**
	 * Counts children recursively in tree node
	 * @param $tree - tree node
	 */
	function count_children(&$tree) {
		$count = count($tree->children);

		for ($i = 0; $i < count($tree->children); $i++) {
			$count += count_children($tree->children[$i]);
		}

		return $count;
	}

	/**
	 * Saves tree into serialized file
	 * @param $tree
	 * @param $fp
	 */
	function save_tree(&$tree, $fp, $is_last_leaf = 0) {
		fwrite($fp, ($tree->letter ? $tree->letter : ' ')); // letter

		if ($is_last_leaf) {
			fwrite($fp, ($tree->last ? '*' : '/')); // flag of end-of-the-word
		} else {
			fwrite($fp, ($tree->last ? '+' : '-')); // flag of end-of-the-word
		}

		fwrite($fp, pack('L', count_children($tree))); // packed 4 bytes count of children

		// recursively saves each child
		for ($i = 0; $i < count($tree->children); $i++) {
			save_tree($tree->children[$i], $fp, ($i == count($tree->children) - 1) ? 1 : 0);
		}
	}

	$time_start = microtime(true);

	$filename = 'words_rus.txt';

	if (!file_exists($filename)) {
		print 'File '. $filename . ' not exists!';
		return;
	}

	// reads all input words separated by new-lines
	$words = file($filename, FILE_IGNORE_NEW_LINES + FILE_SKIP_EMPTY_LINES);

	$tree = new Tree('!');

	$c = '';

	// creates first-level tree with first-word-letters children
	for ($i=0; $i<count($words); $i++) {
		$words[$i] = strtolower(trim($words[$i]));

		if ($c != $words[$i][0]) {
			$c = $words[$i][0];

			$tree->addChild($c, $i);
		}
	}

	// recursively creates children
	recurse($tree);


	$time_end = microtime(true);
	$time = $time_end - $time_start;

	print "Create Tree $time seconds\n";

	$time_start = microtime(true);

	// saves binary serialized tree to file
	$fp = fopen('tree_rus.txt', 'w+b');
	save_tree($tree, $fp);
	fclose($fp);

	$time_end = microtime(true);
	$time = $time_end - $time_start;

	print "Save Tree $time seconds\n";

	dp($tree);
