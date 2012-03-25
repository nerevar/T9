<?
/**
 * Класс для работы с деревом
 */
class Tree
{
	var $letter = null;
	var $from = null;

	/**
	 * @var Уровень глубины
	 */
	public $level = null;

	public $last = false;

	/**
	 * @var array Потомки
	 */
	public $children = null;


	/**
	 * Конструктор
	 * @param $c
	 * @param $from
	 */
	public function __construct($c = null, $from = null, $level = -1) {
		$this->letter = $c;
		$this->from = $from;
		$this->level = $level;
	}

	/**
	 * Добавление потомка
	 * @param $c
	 * @param int $from
	 * @return Tree
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