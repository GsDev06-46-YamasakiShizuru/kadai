<?php
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){
//    $view .= "<p>";
//    $view .= "<a>";  
//    $view .= $res["Book_name"];
//    $view .= "</a>"; 
//    $view .= "<br>";  
//    $view .= $res["kansou"];  
//    $view .= "<br>";
//     $view .= "<span>";   
//    $view .= $res["Book_URL"];  
//      $view .= "</span>";
//       $view .= "<br>";
//     $view .= "<span>";   
//    $view .= $res["indate"];  
//      $view .= "</span>";
//    $view .= "</p>";
//    $view= "<a href ="$view.$res["Book_URL"]">";
//     $view .= $res["Book_name"];
//    $view .= "</a>";
      
    $view .= '<p class="link">';//クラスを作るときはダブルとシングルコーテーションに気をつける！
    $view .= '<a href = "bm_list_view.php?id='.$res["id"].'">';
    $view .= $res["Book_name"]."[".$res["indate"]."]";
    $view .= "</a>";
    $view .= "　";  
    $view .= '<a href = "delete_book.php?id='.$res["id"].'">';  
    $view .= "[削除]";
    $view .= "</a>";    
    $view .= "</p>";
      
//      $view .= '<p>';
//      $view .= '<a href="bm_list_view.php?id="';
//      $view .= $res["id"];
//      
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="select.css">

<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->


    
      <div class="jumbotron2">
      <a class="navbar-brand" href="index_book.php">データ登録</a>
      </div>
 
  

<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <div class="container jumbotron"><?=$view?></div>
</div>
<!-- Main[End] -->

</body>
</html>
