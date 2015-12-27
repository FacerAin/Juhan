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
			<a href="main.php">
		<img src="1ddUd015tqq84cnz8r3b_qybuxp.png" alt="Juhan" class="img-circle" id="logo">
			</a>

		<h1><a href="main.php">주한위키</a></h1>
		<h6>우리 모두의 주한</h6>


		</header>
		<div class="row">
		<nav class="col-md-2 ">
			<ol class="nav nav-pills nav-stacked">
				<?php
				while($row=mysqli_fetch_assoc($result)){
					echo '<li>
						<a href="main.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a>
						</li><br>';
				}
				?>
			</ol>
		</nav>
		<div class="col-md-10">
			<div id= control>


				<h2><a href="write.php" class="btn btn-success btn-lg">글쓰기</a></h2>
				<?php
				if(empty($_GET['id']) == false) {
					echo'<form action="remove.php" METHOD="post">
				<div style="display:none;">
				  <input type="text" name="id" value="' .$_GET['id'].'">
				  </div>

				  <input type="submit" value="글삭제" class="btn btn-danger btn-lg">
				</form>';
				}
				?>

			</div>

			<article>
				<?php
				if(empty($_GET['id']) == false) {
					$sql = "SELECT topic.id,title,name,description FROM topic LEFT JOIN user on topic.author=user.id WHERE topic.id=".$_GET['id'];
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);

					echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
					echo "작성자:&nbsp;";
					echo htmlspecialchars($row['name']);

					echo "<br>";
					echo "<hr>";
					echo$row['description'];
				} else {
					echo '<h1>'.'<span class="label label-default">'."주한위키에 오신 것을 환영합니다!".'</span>'.'<h1>';
				}
				?>

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
