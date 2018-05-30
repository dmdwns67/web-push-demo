<?php
    session_start();
    
	include_once "connectDB.php";

    $id = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['auth'] = $id;

    $rlt = $dbConnect->query("SELECT adminKey FROM Admin WHERE id='$id' AND password='$password'");
    $row=mysqli_fetch_array($rlt);
    $_SESSION['key'] = $row[0];

    if($row){
        header("Refresh:0; url='../html/control.html'");
    }else{
        echo "<script>alert('로그인 실패!');</script>";
        header("Refresh: 0; url='../html/login.html'");
    }
?>