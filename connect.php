<?php
	$conn = mysqli_connect("localhost", "root", "111111" , "ticketing");


	$sql = "SELECT * FROM musical";
	$result = mysqli_query($conn, $sql);


		echo "<h2>공연중인 뮤지컬</h2>";
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
			echo  " 제목 : " . $row["m_name"]. "&nbsp&nbsp&nbsp가격 : " . $row["price"]."<br>";
			}
		}else{
			echo "테이블에 데이터가 없습니다.";
		}
?> 

<h2>회원가입</h2>
<form action="register.php" method="post" name="form">
<table border="0">
	<tr>
		<td>ID <input type="text" name="id" value=""></td>
	</tr><tr>
		<td>Password <input type="text" name="pw" value=""></td>
	</tr><tr>
		<td>Name <input type="text" name="name" value=""></td>
		<td><input type="submit" value="join"></td>
	</tr>
</table>
</form>

<h2>로그인</h2>
<form action="login.php" method="post" name="form">
<table border="0">
	<tr>
		<td>ID <input type="text" name="id" value=""></td>
	</tr><tr>
		<td>Password <input type="text" name="pw" value=""></td>
		<td><input type="submit" value="login"></td>
	</tr>
</table>
</form>



<?php

	$id = $_POST['id'];
	$seatqty = $_POST['seatqty'];
	$m_number = $_POST['m_number'];
	$m_date = $_POST['m_date'];



		$sql2 = "INSERT INTO reservation VALUES('$id', '$m_number', '$m_date', $seatqty)";
		$result2 = mysqli_query($conn, $sql2);

		if ($result2 && $seatqty){
			$sql1 = "SELECT m_name, price * $seatqty AS totalprice FROM musical WHERE m_number='$m_number'";
			$sql3 = "UPDATE seat SET restqty=restqty-$seatqty WHERE m_number='$m_number' AND m_date='$m_date'";
			$result1 = mysqli_query($conn, $sql1);
			$result3 = mysqli_query($conn, $sql3);
			if (mysqli_num_rows($result1) > 0) {
				while($row1 = mysqli_fetch_assoc($result1)) {
					echo  " 뮤지컬 " . $row1["m_name"]. "&nbsp예매완료 총 " . $row1["totalprice"]." 원<br>";
				}
			}
			echo "<h3>예매가 완료되었습니다</h3>";
		}else if($id && (!$result2) && $seatqty) echo "<h3>같은 날짜에 이미 예매하셨습니다</h3>";
		else if(!$seatqty) echo "<h3>좌석을 선택하지 않으셨습니다</h3>"
	
?> 

