<?php
	include_once "connectDB.php";
    
    $dbConnect->query("DELETE FROM Subscribers");

    echo "<script>alert('전체 삭제되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../html/control.html" />