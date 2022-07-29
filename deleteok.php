<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computer10";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$sql = "DELETE FROM member WHERE num=".$_GET["num"];

if ($conn->query($sql) === TRUE) {
  echo "레코드가 삭제되었습니다.";
} else {
  echo "Error deleting record: " . $conn->error;
}
mysqli_close($conn)
?>

<div>
    <a href="./list.php">회원목록</a>
    <a href="./register.html">회원등록</a>
</div>