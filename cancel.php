<?php 
    session_start();
	$conn = mysqli_connect("localhost", "root", "111111" , "ticketing");


    $cancel = $_POST['cancel'];
    $strTok =explode(',' , $cancel);
    $cnt = count($strTok);
    for($i = 0 ; $i < $cnt ; $i++){
	    echo($strTok[$i] . "<br/>");    
    }

    $qty = (int)$strTok[3];

    $sql = "DELETE FROM reservation WHERE id='$strTok[0]' AND m_number='$strTok[1]' AND m_date='$strTok[2]'";
    $result = mysqli_query($conn, $sql);
    $sql1 = "UPDATE seat SET restqty=restqty+'$qty' WHERE m_number='$strTok[1]' AND m_date='$strTok[2]'";
    $result2 = mysqli_query($conn, $sql1);
    if ($result){
        echo "예매가 취소되었습니다";
       
    }    
?>
