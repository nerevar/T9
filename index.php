<!doctype html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="normal-browser" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>T9 algorithm</title>

	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" href="css/style.css">

	<!--[if lt IE 9]>
		<script src="/js/libs/html5.js"></script>
	<![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">T9 algorithm</a>

			<div class="nav-collapse">
				<ul class="nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
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
					<span class="en two-line">&nbsp;&nbsp;&nbsp;␣</span>
				</button>
				<button class="del">
					<span class="num">&larr;</span>
					<span class="en">back</span>
					<span class="ru">удал.</span>
				</button>
			</figure>
		</div>
		<div class="span6 offset1">
			<h1>T9 algorithm v2.0</h1>
			<p>Here you can convert any digit sequence into English or Russian words.</p>
			<form method="post" action="/ajax.php" id="search_form" class="form-inline form-search">
				<div class="control-group">
					<input type="text" name="search" id="search" class="input-xxlarge-responsive search-query" placeholder="Enter some digits..." autocomplete="off" />
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

<script src="js/libs/bootstrap/transition.js"></script>
<script src="js/libs/bootstrap/collapse.js"></script>

<script src="js/script.js"></script>
</body>
</html>
