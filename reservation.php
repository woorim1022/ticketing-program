<?php 
    session_start();
	$conn = mysqli_connect("localhost", "root", "111111" , "ticketing");

    $id = $_POST['id'];
    $m_name = $_POST['m_name'];

    $sql = "SELECT s.* FROM seat s, musical m WHERE s.m_number=m.m_number AND m.m_name='$m_name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        echo "<form action='qty.php' method='post' name='form'>";
                $j = 0;
                echo "<input type='text' name='id' style='display:none;' value='" .$id. "'>";
                while($row = mysqli_fetch_assoc($result)){   
                        $date[$j] = $row["m_date"];
                        echo "<input type='text' name='m_name' style='display:none;' value='" . $m_name. "'>";
                        echo   "&nbsp<input type='radio' name='m_date' value='" . $date[$j]. "'>";
                                echo "날짜 :" . $date[$j]. "&nbsp&nbsp&nbsp&nbsp잔여석 : ". $row["restqty"]. "석<br>";
                        $j++;
                    
                }
                echo  "<input type='submit' value='좌석수선택'> 
            </form>";

      
    }    
?>
