<?php
//1.POSTでParamを取得
$id     = $_POST["id"];
$name   = $_POST["name"];
$URL  = $_POST["URL"];
$kansou = $_POST["kansou"];

//1.アップロードが正常に行われたかチェック
//isset();でファイルが送られてきてるかチェック！そしてErrorが発生してないかチェック
if(isset($_FILES['filename']) && $_FILES['filename']['error']==UPLOAD_ERR_OK){
    
    //2. アップロード先とファイル名を作成
    $upload_file = "./upload/".$_FILES["filename"]["name"];
    
    // アップロードしたファイルを指定のパスへ移動
    //move_uploaded_file("一時保存場所","成功後に正しい場所に移動");
    if (move_uploaded_file($_FILES["filename"]['tmp_name'],$upload_file)){
        
        //パーミッションを変更（ファイルの読み込み権限を付けてあげる）
        chmod($upload_file,0644);
        
        
    }else{
        echo "fileuploadOK...Failed";
        exit;
    }
}else{
    echo "fileupload失敗";
}

//2. DB接続します(エラー処理追加)
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET Book_name=:name,Book_URL=:URL,kansou=:kansou,upfile=:upfile indate=sysdate() WHERE id=:id");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':URL', $URL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kansou', $kansou, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':upfile', $upload_file, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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
