<?php
include 'db.php';
session_start();

?>
<!DOCTYPE HTML>
<!--
	Halcyonic by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>LOVEPL</title>
		<meta charset="utf-8" />
	 <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
	 <link href="bootstrap-3.3.2-dist/css/jumbotron.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body>
		<div id="page-wrapper">
			<!-- Header -->
				<section id="header">
					<div class="container">
						<div class="row">
							<div class="col-12">

								<!-- Logo -->
									<h1><a href="index.php" id="logo">LOVEPL</a></h1>

								<!-- Nav -->
									<nav id="nav">
										<a href="index.php">HOME</a>
										<a href="threecolumn.php">EPL TALK</a>
										<a href="onecolumn.html">About Us</a>
									</nav>

							</div>
						</div>
					</div>
					<div id="banner">
						<div class="container">
							<div class="row">
								<div class="col-6 col-12-medium">

									<!-- Banner Copy -->
										<p>Hey, This site is all about EPL! it's made by 20150700</p>
										<a href="#" class="button-large">Click me!</a>

								</div>
								<div class="col-6 col-12-medium imp-medium">

									<!-- Banner Image -->
										<a href="#" class="bordered-feature-image"><img src="images/banner.jpg" alt="" /></a>

								</div>
							</div>
						</div>
					</div>
				</section>

			<!-- Features -->
				<section id="features">
					<div class="container">
						<div class="row">
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #1 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic01.jpg" alt="" /></a>
										<h2>Chelsea legend asked who can replace Eden Hazard after Real Madrid move… he said this</h2>
										<p>
											Hazard joined Real Madrid this summer for £88million, with add-ons potentially taking the fee to £130m.

											The silky playmaker leaves a large void at Stamford Bridge, where he scored 110 goals and laid on 92 assists in 352 appearances.

										</p>
									</section>

							</div>
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #2 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic02.jpg" alt="" /></a>
										<h2>Tottenham's Heung-Min Son crowned London's Premier League Player of the Year</h2>
										<p>
The South Korean was awarded the top gong for his stunning form this season that has seen him score 16 goals in 34 games in all competitions.
										</p>
									</section>

							</div>
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #3 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic03.jpg" alt="" /></a>
										<h2>Manchester City retain English Premier League title</h2>
										<p>
										Manchester City Football Club clinched another Premier League title on Sunday by beating Brighton & Hove Albion 4-1 on the final day of the season.
										</p>
									</section>

							</div>
							<div class="col-3 col-6-medium col-12-small">

								<!-- Feature #4 -->
									<section>
										<a href="#" class="bordered-feature-image"><img src="images/pic04.jpg" alt="" /></a>
										<h2>Champions League final: Liverpool crowned kings of Europe after beating Tottenham </h2>
										<p>
											Liverpool have won the Champions League after beating Tottenham 2-0 in the final in Madrid.

Mo Salah, who scored the first goal from the penalty spot in the second minute, said it was "unbelievable for me".
										</p>
									</section>

							</div>
						</div>
					</div>
				</section>

			<!-- Content -->
			<section id="content">
				<div class="container">
					<div class="row">
						<nav class="navbar navbar-inverse navbar-fixed-top">

<div class="container">

	<div class="navbar-header">


			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

		</button>

		<a class="navbar-brand" href="signup.html"> Join Us</a>

	</div>

	<div id="navbar" class="navbar-collapse collapse">
		<?php

		if( !isset($_SESSION[is_login]) && $_SESSION[in_login] != 1 ) {

		?>

					<form class="navbar-form navbar-right" method=POST action=signin.php>

						<div class="form-group">

							<input type="text" name=user_id placeholder="USER ID" class="form-control">

						</div>

						<div class="form-group">

							<input type="password" name=user_pw placeholder="Password" class="form-control">

						</div>

						<button type="submit" class="btn btn-success">Sign in</button>

					</form>

		<?php

		} else {

		?>


				<form class="navbar-form navbar-right" method=POST action=signout.php>

					<button type="submit" class="btn btn-success">Sign out</button>

				</form>


		<?php

		}

		?>

			</div>

		</nav>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>


	</body>
</html>
