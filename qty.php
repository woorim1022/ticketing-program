<?php 
    session_start();
	$conn = mysqli_connect("localhost", "root", "111111" , "ticketing");

    $m_date = $_POST['m_date'];
    $m_name = $_POST['m_name'];
    $id = $_POST['id'];
    echo $id;
    echo  $m_date;
    echo  $m_name;

    $sql = "SELECT s.* FROM seat s, musical m WHERE s.m_number=m.m_number AND m.m_name='$m_name' AND s.m_date='$m_date'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){ 
            echo "<form action='connect.php' method='post' name='form'>";

                echo "<input type='text' name='id' style='display:none;' value='" .$id. "'>";
                echo "<input type='text' name='m_number' style='display:none;' value='" .$row["m_number"]. "'>";
                echo "<input type='text' name='m_date' style='display:none;' value='" . $row["m_date"]. "'>";

                echo "<select name='seatqty'>";
                for($i=1; $i <= $row["restqty"]; $i++){

                    echo "<option value='"  . $i.   "'>" . $i . "</option>";

                }
                echo "</select>";
                echo  "<input type='submit' value='예매완료'> 
            </form>";


        }
      
    }




    
?>

