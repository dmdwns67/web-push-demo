<?php
	include "connectDB.php";

	$bno = $_GET['idx'];
    $rlt =$dbConnect->query("SELECT img FROM EventList where idx='$bno';");
    $row=mysqli_fetch_array($rlt);
    echo $row[0];
    unlink($row[0],0777);

	$dbConnect->query("delete from EventList where idx='$bno';");

    echo "<script>alert('삭제되었습니다.');</script>";
?>
<meta http-equiv="refresh" content="0 url=../html/control.html" />
