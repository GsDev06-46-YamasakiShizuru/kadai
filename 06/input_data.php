<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>GET練習</title>
</head>
<body>
<!--<form action="get_confirm.php" method="get" class="form-outer">-->
<form action="write_test.php" method="post" class="form-outer">
<!--<form action="write.php" method="post">-->
<!--
	お名前: <input type="text" name="name">
	EMAIL: <input type="text" name="mail">
	<input type="submit" value="送信">
-->
<!--	<form action="" class="form-outer">-->
     <h1>アンケート</h1>
		<dl class="form-list">
			<dt class="form-title">名前</dt>
			<dd class="form-detail"><input type="text" name="name" class="form-parts"></dd>
			<dt class="form-title">カナ</dt>
			<dd class="form-detail"><input type="text" name="kana" class="form-parts"></dd>
			<dt class="form-title">メールアドレス</dt>
			<dd class="form-detail"><input type="text" name="mailaddress" class="form-parts"></dd>
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
		</dl>
		<p class="text-center"><input type="submit" value="送信する" class="btn btn-submit"></p>
		
<!--	</form>-->
</form>
<ul>
</ul>
</body>
</html>