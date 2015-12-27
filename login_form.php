
<?php
require("config/config.php");
require("lib/db.php");
$conn=db_init($config["host"],$config["duser"],$config["dpw"],$config["dname"]);
$result = mysqli_query($conn, "SELECT * FROM topic ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="stylesheet" type="text/css" href="style.css">
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body id="target">
	<div class="container">
		<header class="jumbotron text-center">
			<a>
		<img src="1ddUd015tqq84cnz8r3b_qybuxp.png" alt="Juhan" class="img-circle" id="logo">
			</a>

		<h1><a>주한위키</a></h1>
		<h6>우리 모두의 주한</h6>


		</header>
		<div class="row">
		<nav class="col-md-2 ">
			<ol class="nav nav-pills nav-stacked">

			</ol>
		</nav>
		<div class="col-md-10">
			<div id= control>




			</div>

			<article>
				<form action="process.php" method="post">
				<div class="form-group">
    				<label for="form-title">아이디</label>
    				<input type="text" class="form-control" name="title" id="form-title" placeholder="Id">
  				</div>

                <div class="form-group">
                    <label for="form-password">비밀번호</label>
                    <input type="password" class="form-control" name="passowrd" id="form-password" placeholder="Password">
                </div>

					<input type="submit" value="로그인" name="name" class="btn btn-primary">
				</form>
			</article>

		</div>

		</div>
	</div>






	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>

</body>
</html>
