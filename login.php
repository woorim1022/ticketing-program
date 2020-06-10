<?php 
    session_start();
	$conn = mysqli_connect("localhost", "root", "111111" , "ticketing");

    $id = $_POST['id'];
    $pw = $_POST['pw'];

    $sql = "SELECT * FROM member WHERE (id, pw) = ('$id', '$pw')";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)==1){
        while($row = mysqli_fetch_assoc($result))
            echo  $row["name"]. "님 환영합니다!";
    } else echo "존재하지 않는 회원입니다!";


    
?>




<?php
    $sql1 = "SELECT * FROM musical";
    $result1 = mysqli_query($conn, $sql1);  


    echo "<h2>뮤지컬 예매</h2>
        <form action='reservation.php' method='post' name='form'>";
        echo "<input type='text' name='id' style='display:none;' value='" .$id. "'>";
            echo "<select name='m_name'>";
            if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_assoc($result1)) {
                    echo "<option value='";echo $row["m_name"];echo "'>". $row["m_name"]. "</option>";
                }
            }
    echo    "</select>
            <input type='submit' value='날짜선택'>
        </form>";
?>



<?php 
    echo "<h2>예매 확인</h2>";

    $sql1 = "SELECT m.m_name, r.* FROM reservation r, musical m WHERE r.m_number=m.m_number AND r.id='$id'";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1)>0){
        while($row1 = mysqli_fetch_assoc($result1)) {
                            echo  " 제목 : " . $row1["m_name"]. "&nbsp&nbsp&nbsp날짜 : " . $row1["m_date"]. "&nbsp&nbsp&nbsp예매수량 : " . $row1["seatqty"]."<br>";
		}
    } else echo "존재하지 않는 회원입니다!";


    
?>
