<?php

$db_host = "DB이름";
$db_user = "사용자";
$db_password = "비밀번호";
$db_name = "member";

$con = new mysqli($db_host, $db_user, $db_password, $db_name); // 데이터베이스 접속
$result = mysqli_query($con, "SELECT * FROM given ORDER BY date_now DESC");
$row = mysqli_fetch_assoc($result);

$_SESSION['today'] = date("Y-m-d");
$human = $row['human'];
$date_action = $row['date_now'];
$date_after = $row['date_after'];

$diff = strtotime($date_after) - strtotime($_SESSION['today']);

$count = ceil($diff / (60*60 *24));
if ($count < 0){
    $count=0;
}


?>
