<?php
	include_once "connectDB.php";
    $term = $_POST['term'];
    
    //오늘 날짜
    $today = date('Y-m-d H:i:s');
    
    if($today < $term){
        echo "<script>alert('과거 기간만 선택 가능합니다!');</script>";
        header("Refresh: 0; url='arrange.php'");
    }else{

    $dbConnect->query("DELETE FROM Subscribers WHERE time < '$term'");

    echo "<script>alert('오래된 미수신 상태의 구독자들을 정리하였습니다!');</script>";
    
?>
<meta http-equiv="refresh" content="0 url=../html/control.html" />
