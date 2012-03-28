<?
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

$letters = array(
	'a' => 2,
	'b' => 2,
	'c' => 2,
	'd' => 3,
	'e' => 3,
	'f' => 3,
	'g' => 4,
	'h' => 4,
	'i' => 4,
	'j' => 5,
	'k' => 5,
	'l' => 5,
	'm' => 6,
	'n' => 6,
	'o' => 6,
	'p' => 7,
	'q' => 7,
	'r' => 7,
	's' => 7,
	't' => 8,
	'u' => 8,
	'v' => 8,
	'w' => 9,
	'x' => 9,
	'y' => 9,
	'z' => 9,
	"'" => 1,
);

$numbers = array(
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

define('LAST_LEAF1', '*');
define('LAST_LEAF2', '/');

define('LAST_CHAR1', '+');
define('LAST_CHAR2', '*');