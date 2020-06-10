<?php
	$conn = mysqli_connect("localhost", "root", "111111" , "ticketing");

    $id = $_POST["id"];
    $pw = $_POST["pw"];
    $name = $_POST["name"];

    $sql = "INSERT INTO member VALUES('$id', '$pw', '$name')";
    $result = mysqli_query($conn, $sql);
    if (!$result) echo "이미 존재하는 아이디입니다!";
    else echo "환영합니다!";



?>

<form action="connect.php" method="post" name="form">
<table border="0">
    <input type="submit" value="메인화면 돌아가기">
</table>
</form>