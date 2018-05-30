<?php
	include_once "connectDB.php";
    
    
    $rlt = $dbConnect->query("update Subscribers set reception='수신 대기' where reception='수신 확인'");
    $row=mysqli_fetch_array($rlt);

    echo "<script>alert('구독자들의 상태가 수신 대기로 초기화 되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../html/control.html" />
