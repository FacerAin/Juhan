
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
			<a href="juhan.php">
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

			</div>

			<article>
				<form action="process.php" method="post">
				<div class="form-group">
    				<label for="form-title">제목</label>
    				<input type="text" class="form-control" name="title" id="form-title" placeholder="제목을 적어주세요.">
  				</div>

				<div class="form-group">
    				<label for="form-author">작성자</label>
    				<input type="text" class="form-control" name="author" id="form-author" placeholder="작성자를 적어주세요.">
  				</div>

				<div class="form-group">
    				<label for="form-textarea">본문</label>
    				<textarea type="text" class="form-control" rows="10" name="description" id="form-textarea" placeholder="본문을 적어주세요."></textarea>
  				</div>

					<input type="submit" value="저장" name="name" class="btn btn-primary">
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
