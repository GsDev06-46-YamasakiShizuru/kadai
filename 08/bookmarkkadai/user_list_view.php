<?php
$id = $_GET["id"];
//1.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");//バインド変数
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
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>GET練習</title>
</head>
<body>
<form method="post" action="user_update.php">

     <h1>会員登録</h1>
		<dl class="form-list">
			<dt class="form-title">名前</dt>
			<dd class="form-detail"><input type="text" name="name" class="form-parts" value="<?=$res["name"]?>"></dd>
			<dt class="form-title">ユーザーID</dt>
			<dd class="form-detail"><input type="text" name="lid" class="form-parts" value="<?=$res["lid"]?>"></dd>
			<dt class="form-title">パスワード</dt>
			<dd class="form-detail"><input type="text" name="lpw" class="form-parts" value="<?=$res["lpw"]?>"></dd>
			<input type="hidden" name="id" value="<?=$res["id"]?>">
<!--
			<dt class="form-title">職業</dt>
			<dd class="form-detail">
				<select name="trigger" id="trigger" class="form-parts form-parts__select">
					<option value="学生">学生</option>
					<option value="会社員">会社員</option>
					<option value="主婦">主婦</option>
					<option value="フリーター">フリーター</option>
					<option value="その他">その他</option>
				</select>
			</dd>
			<dt class="form-title">メルマガの配信</dt>
			<dd class="form-detail">
				<ul >
					<li style="list-style:none;"><label for="company"><input type="radio" name="reason" value="する" id="company" class="form-parts__radio">希望する</label></li>
					<li style="list-style:none;"s><label for="jobchange"><input type="radio" name="reason" value="しない" id="jobchange" class="form-parts__radio">希望しない</label></li>
					
				</ul>
			</dd>
			<dt class="form-title">コメント</dt>
			<dd class="form-detail"><textarea name="detail" id="detail" cols="30" rows="10" class="form-parts__textarea"></textarea></dd>
-->
		</dl>
		<p class="text-center"><input type="submit" value="更新" class="btn btn-submit"></p>
		
<!--	</form>-->
</form>
<ul>
</ul>
</body>
</html>