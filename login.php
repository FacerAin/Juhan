

<?php
	$conn = mysqli_connect("localhost", "root", 123456);
	mysqli_select_db($conn, "juhan");
	
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$sql = "SELECT name FROM user WHERE name='".$name."' AND password=password('".$password."')";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		setcookie("loged_in", $result, time() + (86400 * 30), "/");
		header("Location:index.php");
	} else {
		echo "로그인에 실패하였습니다. <br>"
		echo "<a href='index.php'>홈페이지로 돌아가기</a>"
	}
?>
