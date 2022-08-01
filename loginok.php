<?php
session_start();

$user = $_POST["user"];
$pass = $_POST["pass"];

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

$sql = "SELECT num,user,name,pass,tel FROM member where user= '$user' and pass='$pass' ";
echo $sql;
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $name = $row["name"];
    $_SESSION["name"] = $name;
    echo "안녕하세요 ". $name ."님, 로그인 되었습니다.<br>";
    echo "<a href='./logout.php'>로그아웃</a><br>";
    echo "<a href='./list.php'>회원목록</a><br>";
    echo "<a href='./list.php'>회원등록</a><br>";
   
  }
} else {
  echo "레코드가 존재하지 않습니다";
}
mysqli_close($conn);
?>