<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">T9 Algorithm</a>

			<ul class="nav">
				<li><a href="/">Home</a></li>
				<li class="active"><a href="/about">About</a></li>
				<li><a href="/details">Details</a></li>
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
			<h3>What is that?</h3>

			<p>T9 – is the words predict algorithm (<a href="http://en.wikipedia.org/wiki/T9_%28predictive_text%29">wiki</a>) for mobile phone. Here you can try one of its implementations!</p>

			<h3>Why is that?</h3>

			<p>You can use it to convert digits, numbers, PIN-codes into words to make it easier to remember. <!-- Or just try what happens if you type <i>«»</i>.--></p>

			<h3>Features:</h3>
			<ul>
				<li>
					words search in Russian and English (btw you can easily add any new language)
				</li>
				<li>
					num keyboard with digits and letters corresponding to Nokia keyboard (except * and #)
				</li>
				<li>
					spaces between digits, 0, 1 - all of them are used as words separators
				</li>
				<li>
					it uses Trie (prefix tree) to provide fast* search in T9 words database (<a href="/details">more…</a>)
				</li>

			</ul>
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
