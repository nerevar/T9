<?php
	/**
	 * Tree class
	 */
	class Tree
	{
		var $letter = null;
		var $from = null;

		/**
		 * @var deep level
		 */
		public $level = null;

		/**
		 * @var bool flag of end-of-the-word
		 */
		public $last = false;

		/**
		 * @var array children
		 */
		public $children = null;


		/**
		 * Constructor
		 * @param $c - letter
		 * @param $from - start line position in source file
		 */
		public function __construct($c = null, $from = null, $level = -1) {
			$this->letter = $c;
			$this->from = $from;
			$this->level = $level;
		}

		/**
		 * Adds child
		 * @param $c - letter
		 * @param int $from - start line position in source file
		 */
		public function addChild($c , $from = 0)
		{
			$child = new Tree($c, $from, $this->level + 1);
			if (!is_array($this->children)) {
				$this->children = array($child);
			} else {
				$this->children[] = $child;
			}
		}
	}

	$numbers['en'] = array(
		0 => array(),
		1 => array("'"),
		2 => array('a', 'b', 'c'),
		3 => array('d', 'e', 'f'),
		4 => array('g', 'h', 'i'),
		5 => array('j', 'k', 'l'),
		6 => array('m', 'n', 'o'),
		7 => array('p', 'q', 'r', 's'),
		8 => array('t', 'u', 'v'),
		9 => array('w', 'x', 'y', 'z'),
	);

	$numbers['ru'] = array(
		0 => array(),
		1 => array("'"),
		2 => array('à', 'á', 'â', 'ã'),
		3 => array('ä', 'å', '¸', 'æ', 'ç'),
		4 => array('è', 'é', 'ê', 'ë'),
		5 => array('ì', 'í', 'î', 'ï'),
		6 => array('ð', 'ñ', 'ò', 'ó'),
		7 => array('ô', 'õ', 'ö', '÷'),
		8 => array('ø', 'ù', 'ú', 'û'),
		9 => array('ü', 'ý', 'þ', 'ÿ'),
	);	

	define('LAST_LEAF1', '*');
	define('LAST_LEAF2', '/');

	define('LAST_CHAR1', '+');
	define('LAST_CHAR2', '*');
