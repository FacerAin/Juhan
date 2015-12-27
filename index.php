<?php
$conn = mysqli_connect("localhost", "root", 123456); //그럴수도있죠
mysqli_select_db($conn, "juhan");

$result = mysqli_query($conn, "SELECT * FROM topic");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body id="target">
	<header>
		<a href="juhan.php">
	<img src="1ddUd015tqq84cnz8r3b_qybuxp.png" alt="Juhan">
		</a>

	<h1><a href="index.php">주한위키</a></h1>
	<h6>우리 모두의 주한</h6>


	</header>
	<nav>
		<ol>
			<?php
			while($row=mysqli_fetch_assoc($result)){
				echo '<li>
					<a href="index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a>

					</li><br>';
			}
			?>
		</ol>
	</nav>
	<div id="control">

		<h2><a href="write.php">글쓰기</a></h2>
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
			echo strip_tags($row['description'],'<a><h1><h2>>h3><h4><h5><ul><ol><li>');
		}
		?>

	</article>



</body>
</html>
