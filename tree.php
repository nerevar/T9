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