<?php
session_start(); // 세션
date_default_timezone_set('Asia/Seoul');
?>
<!doctype html>
      <html>
<head>
<meta charset="utf-8">
<title>스투키!!</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="stylesheet" href="style.css">
     </head>

<body>

  <header>
    <?php
      include 'connect.php';
      $lname = $_SESSION['id'];
      $_SESSION['today'] = date("Y-m-d");
      echo "<h3> $lname 님이 로그인 하였습니다.</h3>";
      echo '<a href="logout.php"><button type="button" class="btn-5">Logout</button></a>';
    ?>
</header>

<div class = "container">
  <div class = "row">
    <div class = "left">
      <h2>물&nbsp;준 사람 : <?=$human?></h2>
    </div>
  <div class = "left2">
<h2>날짜 : <?=$date_action?> </h2>
  </div>
    </div>
      <div class = "right">
        <h2> 예정일 : <?=$date_after?> </h2>
        </div>
      <div align="center"><img src="/img/plant_<?=$count?>.png"/></div>
      <?php
if ($count <= 0){ ?><h2> 식물에 물을 줘야합니다. </h2><?php }
else{ ?><h2 class ="cent"> <?=$count?> 일 남았습니다. </h2><?php }?>
  <div class = "footer">
    <form action="insert.php" method="POST" style ="background-color: transparent;">
        <div>
            <?php
            if ($_SESSION['today'] < $date_after) {
                ?><div align="center"><button class="btn btn-info btn-f" disabled="disabled">
                  물을 주었습니다</button></div><?php }
            else{
                ?><div align="center"><button class="btn btn-info btn-f" type="submit">
                  물을 주세요</button></div><?php
            } ?>
        </div>
    </form>
  </div>
</div>

    <script src="script.js"></script>
     </body>
   </html>
