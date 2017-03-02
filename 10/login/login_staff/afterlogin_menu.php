<?php
session_start();
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error";
    exit();
}

?>



<!DOCTYPE html>
<html lang="ja">
<a href="../logout.php" style="color:#ffffff">Logout</a>
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="staff.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header class="header">
<p class="message">
    <?php
    echo $_SESSION["name"];
    ?>
    さん一般者用ページへようこそ
</p>
<!--<img src="http://1.bp.blogspot.com/-R0R5ox4El10/ThkxGqjzobI/AAAAAAAABXI/cK6UV3O3lUw/s1600/c96.jpg" class="header_img">-->
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
<!-- ブックマークを新規追加-->
  <figure class="snip1141"><img src="http://gahag.net/img/201606/05s/gahag-0093274470-1.jpg" alt="sq-sample27" />
  <figcaption>
    <div class="circle"><i class="ion-ios-plus-empty"> </i></div>
    <h2>add Bookmark</h2>
  </figcaption>
  <a href="../bookmarkkadai/index_book.php"></a>
</figure>
<!--データ一覧-->
<figure class="snip1384"><img src="http://cafe.sorohiru.com/photos/039_09.jpg" alt="sample83" />
 <figcaption>
<h3>Data list</h3>
    <p>Check your bookmark</p><i class="ion-ios-arrow-right"></i>
  </figcaption>
  <a href="../bookmarkkadai/select_book.php"></a>
</figure>
<!--会員登録-->

</form>
<!-- Main[End] -->


</body>
</html>
