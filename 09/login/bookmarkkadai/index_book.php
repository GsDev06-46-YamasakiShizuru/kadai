<?php
session_start();
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error";
    exit();
}else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"]=session_id();
}

?>





<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <link href="input.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
 <div class="slider">
 <h1>私の本棚</h1>
 
 
</div>
<!--
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select_book.php">データ一覧</a></div>
    </div>
  </nav>
</header>
-->
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert_book.php">

<ul class="info" style="list-style:none;">
 <li class="jumbotron2">
   
    <a class="navbar-brand" href="select_book.php">データ一覧</a>
   </li>

 <li>
  <div class="jumbotron">
    <h2>新規登録</h2>
    <dl>
    <dt>書籍名</dt>
    <dd><input type="text" name="name" class="box"></dd>
     <dt>書籍URL</dt>
     <dd><input type="text" name="URL" class="box"></dd>
     <dt>書籍コメント</dt><dd><textArea name="kansou" rows="4" cols="40" class="box"></textArea></dd>
     <input type="submit" value="送信" class="send">
     </dl> 
  </div>
</li>
 </ul>



</form>
<!-- Main[End] -->


</body>
</html>
