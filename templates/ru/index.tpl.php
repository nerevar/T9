<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="#">T9 Алгоритм</a>

			<ul class="nav">
				<li class="active"><a href="/">Домой</a></li>
				<li><a href="/about">Что это?</a></li>
				<li><a href="/details">Подробнее</a></li>
			</ul>

			<ul class="nav pull-right">
				<li><a href="#" class="change_language" data-lang="RU"><i class="flag-RU"></i> RU</a></li>
				<li><a href="#" class="change_language" data-lang="EN"><i class="flag-US"></i> EN</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="container">
	<div class="row" id="centered">
		<div class="span2">
			<figure class="keyboard">
				<button>
					<span class="num">1</span>
					<span class="en two-line">&nbsp;&nbsp;.,?!</span>
				</button>
				<button>
					<span class="num">2</span>
					<span class="en">abc</span>
					<span class="ru">абвг</span>
				</button>
				<button>
					<span class="num">3</span>
					<span class="en">def</span>
					<span class="ru">дежз</span>
				</button>
				<button>
					<span class="num">4</span>
					<span class="en">ghi</span>
					<span class="ru">ийкл</span>
				</button>
				<button>
					<span class="num">5</span>
					<span class="en">jkl</span>
					<span class="ru">мноп</span>
				</button>
				<button>
					<span class="num">6</span>
					<span class="en">mno</span>
					<span class="ru">рсту</span>
				</button>
				<button>
					<span class="num">7</span>
					<span class="en">pqrs</span>
					<span class="ru">фхцч</span>
				</button>
				<button>
					<span class="num">8</span>
					<span class="en">tuv</span>
					<span class="ru">шщъы</span>
				</button>
				<button>
					<span class="num">9</span>
					<span class="en">wxyz</span>
					<span class="ru">ьэюя</span>
				</button>
				<button>
					<span class="num">*</span>
				</button>
				<button>
					<span class="num">0</span>
					<span class="en two-line">&nbsp;&nbsp;&nbsp;?</span>
				</button>
				<button class="del">
					<span class="num">&larr;</span>
					<span class="en">back</span>
					<span class="ru">удал.</span>
				</button>
			</figure>
		</div>
		<div class="span6 offset1">
			<h1>T9 Алгоритм v2.1</h1>
			<p>Сюда можно вводить цифры для преобразования их в слова.</p>
			<form method="post" action="/ajax.php" id="search_form" class="form-inline form-search">
				<div class="control-group">
					<input type="text" name="search" id="search" class="input-xxlarge-responsive search-query" placeholder="Введите цифры   ..." autocomplete="off" />
					<button type="submit" class="btn" value="search"><i class="icon-search"></i></button>
				</div>
			</form>
			<div id="results"></div>
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
