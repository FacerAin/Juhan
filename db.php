<?php
function db_init($host, $duser, $dpw,$dname){
$conn = mysqli_connect($host, $duser, $dpw); //그럴수도있죠
mysqli_select_db($conn, $dname);
return $conn;
}

?>
