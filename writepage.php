<?php
header("Content-Type:text/html;charset=utf-8");
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
		<title>글쓰기</title>
		<link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
	 	 <link href="bootstrap-3.3.2-dist/css/jumbotron.css" rel="stylesheet">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header">
					<div class="container">
						<div class="row">
							<div class="col-12">

								<!-- Logo -->
									<h1><a href="index.html" id="logo">LOVEPL</a></h1>

								<!-- Nav -->
								<nav id="nav">
									<a href="index.php">HOME</a>
									<a href="threecolumn.php">EPL Talk</a>
									<a href="onecolumn.html">About Us</a>
								</nav>

							</div>
						</div>
					</div>
				</section>

			<!-- Content -->
			<nav class="navbar navbar-inverse navbar-fixed-top">

				<div class="container">

					<div class="navbar-header">

						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

							<span class="sr-only">Toggle navigation</span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

						</button>

						<a class="navbar-brand" href="#"> 회원 가입 </a>

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


			</form>

					</div><!--/.navbar-collapse -->

				</div>

			</nav>


			<!-- Main jumbotron for a primary marketing message or call to action -->

			<div class="jumbotron">

				<div class="container">

					<form class="form-horizontal" method=POST action=write_ok.php>

						<div class="form-group">

							<label for="inputEmail3" class="col-sm-2 control-label">제목</label>

								<div class="col-sm-10">

									<input type="text" name=title class="form-control" id="inputEmail3">

								</div>

						</div>

					<label for="inputEmail3" class="col-sm-2 control-label">게시글</label>

					<div class="col-sm-offset-2 col-sm-10">

							<textarea name=body class="form-control" rows="10"></textarea>

					</div>

					
				</div>

				</div>
				<div class="col-sm-offset-2 col-sm-10">

			<button type="submit" class="btn btn-default">작성 완료</button>

						</div>

					 </form>

				</div>

			</div>



		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>

<?php

  //echo "<script> alert('로그인한 사용자만 글 작성이 가능합니다'); </script>";

?>

  <meta http-equiv='refresh' content="0;url='index.php'>
