<?php
session_start();
if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"]!=session_id()){
    echo "LOGIN Error";
    exit();
}

?>


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
			
<label>
<?php
$kanri = $res["kanri_flg"];
              
$checked0 = ($kanri) ? "" : "checked";
$checked1 = ($kanri) ? "checked" : "";
              
echo <<< EOT
<input type="hidden" name="id" value="$id">
<dt class="form-title">管理</dt>
<dd class="form-detail">
<ul >
<li style="list-style:none;"><label for="company"><input type="radio" name="kanri_flg" value="0"class="form-parts__radio" $checked0>一般</label></li>
<li style="list-style:none;"s><label for="jobchange"><input type="radio" name="kanri_flg" value="1" class="form-parts__radio" $checked1>管理者</label></li>
</ul>
</dd>
EOT;
?>
</label><br>
<label>
<?php
$life = $res["life_flg"];
$checked0 = ($life) ? "" : "checked";
$checked1 = ($life) ? "checked" : "";
echo <<< EOT
<input type="hidden" name="id" value="$id">
<dt class="form-title">管理</dt>
<dd class="form-detail">
<ul >
<li style="list-style:none;"><label for="company"><input type="radio" name="life_flg" value="0"class="form-parts__radio" $checked0>使用中</label></li>
<li style="list-style:none;"s><label for="jobchange"><input type="radio" name="life_flg" value="1" class="form-parts__radio" $checked1>退会</label></li>
</ul>
</dd>
EOT;
?>
</label>
    
<!--
    <dt class="form-title">管理</dt>
                <dd class="form-detail">
                    <ul >
                        <li style="list-style:none;"><label for="company"><input type="radio" name="kanri_flg" value="0"class="form-parts__radio">一般</label></li>
                        <li style="list-style:none;"s><label for="jobchange"><input type="radio" name="kanri_flg" value="1" class="form-parts__radio">管理者</label></li>
                    </ul>
                </dd>
             <dt class="form-title">管理</dt>
                <dd class="form-detail">
                    <ul >
                        <li style="list-style:none;"><label for="company"><input type="radio" name="life_flg" value="0"class="form-parts__radio">使用中</label></li>
                        <li style="list-style:none;"s><label for="jobchange"><input type="radio" name="life_flg" value="1" class="form-parts__radio">退会</label></li>
                    </ul>
                </dd>
-->
    
    
		</dl>
		<p class="text-center"><input type="submit" value="更新" class="btn btn-submit"></p>
		
<!--	</form>-->
</form>
<ul>
</ul>
</body>
</html>