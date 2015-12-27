

<?php
$conn = mysqli_connect("localhost", "root", 123456);
mysqli_select_db($conn, "juhan");
$name = mysqli_real_escape_string($conn, $_GET['name']);
$password = mysqli_real_escape_string($conn, $_GET['password']);
$sql = "SELECT * FROM user WHERE name='".$name."' AND password='".$password."'";
echo $sql;
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
</head>
<body>
<?php

?>
</body>
</html>
