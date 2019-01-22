<?php

session_start();

$con=mysqli_connect("DB이름", "사용자 이름", 비밀번호 );//데이터베이스를 접속하는 $conn이라는 변수 설정
mysqli_select_db($con, "member");//mysql에 접속하여 db라는 데이터베이스 선택

$today = $_SESSION['today'];
$human = $_SESSION['id'];
$date_e = date("Y-m-d", strtotime("+1 week", strtotime($today)));

$result = mysqli_query($con, "SELECT * FROM given ORDER BY date_now DESC");
$row = mysqli_fetch_assoc($result);

if($row['date_now']==$today){
	echo "<script>
        alert('이미 물을 주었습니다.');
        history.go(-1);
        </script>";
}
else{
	$sql = "INSERT INTO given (date_now, date_after , human) VALUES('$today', '$date_e' ,'$human')";
	mysqli_query($con, $sql);
	header("Location: 이동할 페이지 입력 ");
}

?>
