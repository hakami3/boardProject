<?php
include 'db.php';
session_start();

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>LOVEPL- EPLTALK</title>
	 <link href="bootstrap-3.3.2-dist/css/bootstrap.min.css" rel="stylesheet">
	 <link href="bootstrap-3.3.2-dist/css/jumbotron.css" rel="stylesheet">
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
			<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="assets/css/main.css" />
		<style type="text/css">
		#context tr:nth-child(even){background-color:#D8D8D8;}


</style>
	</head>
	<body class="subpage">
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
				</section>

			<!-- Content -->
				<section id="content">
					<div class="container">
						<div class="row">
							<nav class="navbar navbar-inverse navbar-fixed-top">

	<div class="container">

		<div class="navbar-header">

			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

				<span class="sr-only">Toggle navigation</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

			</button>

			<a class="navbar-brand" href="signup.html"> Join Us </a>

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


<!-- Main jumbotron for a primary marketing message or call to action -->

<div class="jumbotron">

	<div class="container">

		<table class="table table-hover" id="context">

			<thead>

				<tr>

					<th> 글 번호 </th>

					<th> &nbsp; &nbsp;&nbsp; &nbsp;    제목 </th>

					<th> &nbsp; &nbsp;&nbsp; &nbsp;    작성자 </th>

					<th> &nbsp; &nbsp;&nbsp; &nbsp;    작성시간 </th>

				</tr>

			</thead>

			<tbody>

<?php

$resource = mysql_query("SELECT * FROM board");

$total_len = mysql_num_rows( $resource );


if( isset($_GET[idx]) ) {

$start = $_GET[idx] * 20;

$sql = "SELECT * FROM board ORDER BY no DESC LIMIT $start, 10";
} else {

$sql = "SELECT * FROM board ORDER BY no DESC LIMIT 10";
}
$resource = mysql_query( $sql );

$num = 1;

while( $row = mysql_fetch_assoc( $resource ) ) {

print "<tr>";

print "<th scope='row'>$num</th>";

print "<td>$row[title]";
?>
<div class="btn">

	<form class="button"  method=POST action=viewpage.php>
		<input type ="hidden" name="view" value="<?=$_GET[idx]; ?>">
		<button type="submit"  class="button">열람</button>
	</form>
</div>
<?php
print "</td>";
print "<td>$row[user_id]</td>";
print "<td>$row[date]</td>";


print "</tr>";



$num++;

}


$count = (int)($total_len / 10);

if( $total_len % 10 ) { $count++; }


print "<tr>";

print "<td colspan=4 align=center>";


for( $i = 0; $i < $count; $i++ ) {

print "<a href=index.php?idx={$i}> [";

$j = $i+1;

print $j;

print "] </a>";

}


print "</td>";

print "</tr>";

?>

			</tbody>

		</table>

	</div>

</div>



<?if($_SESSION[user_id]){?>


<div class="container">

	<form class="navbar-form navbar-right" method=POST action=writepage.php>

		<button type="submit" class="btn btn-success">글쓰기</button>

	</form>

</div>
	<?}?>


		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
