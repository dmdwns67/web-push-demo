<?php
    session_start();
	include_once "connectDB.php";
	//header('Content-Type: text/html; charset=utf-8');

	$title = $_POST['title'];
	$content = $_POST['content'];
	$term = $_POST['term'];
	$file = $_FILES['upload']['name'];
	$path = "../images/".$_FILES['upload']['name'];
	$type = $_FILES['upload']['type'];
    $adminKey = $_SESSION['key'];

	if($title == ""){
		echo "<script>
		alert('제목을 입력해주세요.');
		history.go(-1);
			</script>";
	}
	else if($content == ""){
		echo "<script>
		alert('내용을 입력해주세요.');
		history.go(-1);
			</script>";
	}
	else if($term == ""){
		echo "<script>
		alert('마감기한을 입력해주세요.');
		history.go(-1);
			</script>";
	}
else if($_FILES['upload']['size'] > 2000000){
	echo "<script>
	alert('이미지 용량을 2M미만으로 줄여주세요.');
	history.go(-1);
		</script>";
}
else if($_FILES['upload']['size'] == 0) {
	echo "<script>
	alert('이미지 첨부를 하지 않으셨습니다.\\n 편집하기 버튼을 눌러 추가할 수 있습니다.');
		</script>";
}

else if(!(($type == 'image/jpg') || ($type == 'image/png') || ($type == 'image/jpeg') || ($type == 'image/bmp')
|| ($type == 'image/tiff'))) {
		echo "<script>
		alert('.jpg  .png .gif 파일만 업로드 가능합니다.');
		history.go(-1);
			</script>";
	}

else {
	if(is_uploaded_file($_FILES['upload']['tmp_name'])){
		if(!(move_uploaded_file($_FILES['upload']['tmp_name'], $path))) {
			echo "파일저장 실패";
		}
	}
        $img="/admin/event/images/".$_FILES['upload']['name'];
		$query = "Insert into EventList(title, content, term, img, adminKey) values ('$title', '$content', '$term', '$img', '$adminKey')";
		$rlt = $dbConnect->query($query);
    
		if(!$rlt)
		echo "DB저장 실패";
		
		
		$dbConnect -> close();

}
?>

<meta http-equiv="refresh" content="0 url=../html/control.html" />