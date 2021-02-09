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
		<title>게시글 보기</title>
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
									<a href="index.php">홈</a>
									<a href="threecolumn.php">EPL 수다</a>
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
<?php
			// 2. 글 데이터 불러오기

			$sql = "select * from board where idx = '".$_POST[idx]."'";

			$result = mysql_query($sql);
			$data = mysql_fetch_array($result);


			if(!$data[idx]){
			    ?>
			    <script>
			        alert("존재하지 않는 글입니다.");
			        history.back();
			    </script>
			    <?
			}

			?>
			<br/>
			<table style="width:1000px;height:50px;border:5px #CCCCCC solid;">
			    <tr>
			        <td align="center" valign="middle" style="font-zise:15px;font-weight:bold;">글보기</td>
			    </tr>
			</table>
			<br/>
			<table cellspacing="1" style="width:1000px;height:50px;border:0px;background-color:#999999;">
			    <tr>
			        <td align="center" valign="middle" style="width:200px;background-color:#CCCCCC;">제목</td>
			        <td align="left" valign="middle" style="width:800px;background-color:#FFFFFF;padding:5px;"><?=$data[title]?></td>
			    </tr>
			    <tr>
			        <td align="center" valign="middle" style="width:200px;background-color:#CCCCCC;">작성자</td>
			        <td align="left" valign="middle" style="width:800px;background-color:#FFFFFF;padding:5px;"><?=$data[user_id]?></td>
			    </tr>
			    <tr>
			        <td align="center" valign="middle" style="width:200px;background-color:#CCCCCC;">작성일</td>
			        <td align="left" valign="middle" style="width:800px;background-color:#FFFFFF;padding:5px;"><?=substr($data[date],0,10)?></td>
			    </tr>
			    <tr>
			        <td align="center" valign="middle" style="width:200px;background-color:#CCCCCC;">내용</td>
			        <td align="left" valign="top" style="width:800px;background-color:#FFFFFF;padding:5px;"><?=nl2Br($data[body])?></td>
			    </tr>
			    <tr>

			        <td align="center" valign="middle" style="width:200px;background-color:#CCCCCC;">이미지</td>
			        <td align="left" valign="top" style="width:800;height:8000;background-color:#FFFFFF;padding:5px;"
			          <?php
								Header('Content-type:image/jpeg');
			          echo $row[image];
			?>
			</td>
			    </tr>

			   </table>
			<br/>
			<table style="width:1000px;height:50px;">
			    <tr>
			        <td align="center" valign="middle">
			        <input type="button" value=" 게시판으로 " onClick="location.href='./threecolumn.php';">

			        <?if($_SESSION[user_id]){?>
			        &nbsp;&nbsp;<input type="button" value=" 새글 작성 " onClick="location.href='./writepage.php';">
			        <?}?>

			        <?if($_SESSION[user_id] == $data[sess_id]){?>
								&nbsp;&nbsp;<input type="button" value=" 삭제 " onClick="board_delete('<?=$data[idx]?>');">
								&nbsp;&nbsp;<input type="button" value=" 게시글 수정 " onClick="location.href='./modifiypage.php';">
			        <?}?>
			        </td>
			    </tr>
			</table>
			<script>
			function board_delete(idx)
			{
			    if(confirm('삭제하시겠습니까?')){
			        location.href='./board_delete;
			    }
			}
			</script>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
