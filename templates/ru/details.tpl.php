<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">T9 Алгоритм</a>

			<ul class="nav">
				<li><a href="/">Домой</a></li>
				<li><a href="/about">Что это?</a></li>
				<li class="active"><a href="/details">Подробнее</a></li>
			</ul>

			<ul class="nav pull-right">
				<li><a href="#" class="change_language" data-lang="RU"><i class="flag-RU"></i> RU</a></li>
				<li><a href="#" class="change_language" data-lang="EN"><i class="flag-US"></i> EN</a></li>
			</ul>

			<div class="nav pull-right social-block">
				<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
				<div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,lj,gplus"></div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="span8 offset2 innertext">
			<h3>Алгоритм работы Т9. Как это всё работает?</h3>

			<p>Итак, изначально имеем файл со словарём &ndash; набором упорядоченных по алфавиту слов какого-то языка. (скачать который, например, можно отсюда <a href="http://dict.buktopuha.net/">http://dict.buktopuha.net/</a>)</p>

			<p>Для того, чтобы быстро перемещаться по файлу, ища подходящие слова, необходимо преобразовать исходный словарь в какой-нибудь формат данных, позволяющий быстро осуществлять операции поиска по нему. В данном случае это будет префиксное дерево &ndash; Trie, которое представляет собой набор вершин, в которых находятся буквы (а также число &ndash; указывающее, какое количество потомков есть у данной вершины - это необходимо для дальнейшего считывания дерева из файла).</p>

			<p>Пример построенного префиксного дерева, содержащего слова: [car, card, carry, cart, cat, cel, celery, close, closely, closet, clue]</p>

			<p class="tacenter"><img alt="Пример префиксного дерева" src="img/detail/tree.png" /></p>

			<p>Каждый оконечный узел/лист дерева (на рисунке помечен черным цветом) определяет слово, которое получится при обходе данного графа до этого узла, поэтому задача алгоритма Т9 сводится к поиску листьев дерева, путь к которым проходит через все буквы, соответствующие исходному цифровому выражению.</p>

			<p>Для сериализации дерева выбран свой формат узла:</p>

			<p><img alt="Формат узла префиксного дерева" src="img/detail/node.png" /></p>

			<p><span class="underline">Каждый узел дерева (node) состоит из 6 байт:</span>
				<ul>
					<li>1 байт сам символ (для хранения словаря русского языка специально выбрана кодировка windows-1251 для уменьшения размера файла дерева)</li>
					<li>
						1 байт, определяющий две характеристики узла:
						<ul>
							<li>последний ли это узел дерева (тогда можно считать что мы нашли слово)</li>
							<li>а также является ли этот дочерний узел последним (для того, чтобы далее перейти на другую ветвь)</li>
						</ul>
					</li>
					<li>4 байта, хранящие количество дочерних узлов у текущего узла (таким образом максимальное количество узлов дерева не может превышать 4 млрд).</li>
				</ul>
			</p>

			<p>После того, как деревья сформированы с помощью специального скрипта (<a href="https://github.com/nerevar/T9/blob/master/parse_file.php">https://github.com/nerevar/T9/blob/master/parse_file.php</a>), можно осуществлять поиск слов по данному дереву.</p>
			<p>Алгоритм самого поиска прост &ndash; при каждом считывании последовательно очередного узла дерева из файла &ndash; проверяется на соответствие буквы цифре из исходного цифрового выражения и тогда считывается либо дочерний узел, либо соседний и поиск продолжается дальше, пока не будут найдены все слова, соответствующие исходному цифровому выражению.</p>
		</div>
	</div>

	<hr>

	<footer>
		<p>&copy; NeReVaR 2012</p>
	</footer>

</div>
<!-- /container -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>
<script src="js/libs/jquery.cookie.js"></script>

<script src="js/script.js"></script>
</body>
</html>
