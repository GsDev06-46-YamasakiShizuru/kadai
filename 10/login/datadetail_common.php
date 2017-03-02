<?php
$id = $_GET["id"];
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");//バインド変数
$stmt->bindValue(":id",$id,PDO::PARAM_INT);//PDO~ セキュリティ強化のため 文字列だったらINTをSTRに変える
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $res = $stmt->fetch();//1レコード取得
}

?>

<!--//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）-->
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
<form method="post" action="bm_update.php">

<ul class="info" style="list-style:none;">
 <li class="jumbotron2">

    <a class="navbar-brand" href="datalist_common.php">データ一覧</a>   
 
  </li>
 <li>
  <div class="jumbotron">
    <h2>詳細</h2>
    <dl>
    <dt>書籍名</dt>
    <dd><input type="text" name="name" class="box" value="<?=$res["Book_name"]?>"></dd>
     <dt>書籍URL</dt>
        <dd><a href="<?=$res["Book_URL"]?>">リンク</a></dd>
     <dt>書籍コメント</dt><dd><textArea name="kansou" rows="4" cols="40" class="box"><?=$res["kansou"]?></textArea></dd>
     <input type="hidden" name="id" value="<?=$res["id"]?>">
     </dl> 
  </div>
</li>

 </ul>



</form>
<!-- Main[End] -->


</body>
</html>
