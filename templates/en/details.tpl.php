<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">T9 Algorithm</a>

			<ul class="nav">
				<li><a href="/">Home</a></li>
				<li><a href="/about">About</a></li>
				<li class="active"><a href="/details">Details</a></li>
			</ul>

			<ul class="nav pull-right">
				<li><a href="#" class="change_language" data-lang="RU"><i class="flag-RU"></i> RU</a></li>
				<li><a href="#" class="change_language" data-lang="EN"><i class="flag-US"></i> EN</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="span8 offset2 innertext">
			<h3>T9 algorightm. How it works.</h3>

			<p>So, first of all, we have a file with a dictionary - a set of ordered alphabetically words of a any language. (you can easily find and example in <a href="http://lmgtfy.com/?q=english+words+list+download">google</a>)</p>

			<p>In order to quickly navigate through the file looking for the right words, you must convert the original dictionary in special data format, allowing you to quickly perform a search operation on it. In this case, it will be a prefix tree - Trie,
				which is a set of nodes, which contain appropriate letters (and also a number of child nodes for this node - it is necessary to further reading from the tree).</p>

			<p>An example of a prefix tree containing words: [car, card, carry, cart, cat, cel, celery, close, closely, closet, clue]</p>

			<p class="tacenter"><img alt="Trie example" src="img/detail/tree.png" /></p>

			<p>Each terminal node / leaf of the tree (in figure is marked in black) defines the word, which is obtained by passing through the graph to the node, so the task of T9 algorithm is to find leaves of the tree, when path to them passes through all the letters that correspond to the original digital sequence.</p>

			<p>To serialize tree it was chosen special node format:</p>

			<p><img alt="Prefix tree node format" src="img/detail/node.png" /></p>

			<p><span class="underline">Every (node) consists of 6 bytes:</span>
				<ul>
					<li>1 byte - character itself (for storing Russian dictionary it was specially selected windows-1251 to reduce file size of the tree)</li>
					<li>
						1 byte - defining two characteristics of node:
						<ul>
							<li>is it a last tree node? (if yes, we assume that we found a word)</li>
							<li>and whether this is the last node in branch (in order to continue to move to another branch)</li>
						</ul>
					</li>
					<li>4 bytes - store the number of child nodes of the current node (so the maximum number of nodes in the tree can not exceed 4 billion).</li>
				</ul>
			</p>

			<p>Once the tree is generated using a special PHP script (<a href="https://github.com/nerevar/T9/blob/master/parse_file.php">https://github.com/nerevar/T9/blob/master/parse_file.php</a>), you can search for words in this tree.</p>
			<p>The entire search algorithm is simple - each successive reading of the next node in the tree from a file - letter checked against the letters from the original digital expression and then after it - read child node, or the next node and search continues, until we find all words that match the original digital expression.</p>
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
