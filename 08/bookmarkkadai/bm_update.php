<?php
//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$URL  = $_POST["URL"];
$kansou = $_POST["kansou"];

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


////３．データ登録SQL作成
//$stmt = $pdo->prepare("UPDATE gs_bm_table SET Book_name=:a1,Book_URL=:a2,kansou=:a3 WHERE id=:id");
//$stmt->bindValue(':a1', $name);
//$stmt->bindValue(':a2', $email);
//$stmt->bindValue(':a3', $naiyou);
//$stmt->bindValue(':id', $id);
//$status = $stmt->execute();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET Book_name=:name,Book_URL=:URL,kansou=:kansou, indate=sysdate() WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', $URL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kansou', $kansou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
//  ５．index.phpへリダイレクト
  header("Location: select_book.php");
  exit;
}



?>
