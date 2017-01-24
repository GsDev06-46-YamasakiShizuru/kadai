<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<title>GET練習</title>
</head>
<body>
<!--<form action="get_confirm.php" method="get" class="form-outer">-->
<form action="write.php" method="post" class="form-outer">
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
			<dd class="form-detail"><input type="text" name="email" class="form-parts"></dd>
			<dt class="form-title">チーズアカデミーを知ったきっかけ</dt>
			<dd class="form-detail">
				<select name="trigger" id="trigger" class="form-parts form-parts__select">
					<option value="google検索">google検索</option>
					<option value="SNS">SNS</option>
					<option value="紹介">紹介</option>
					<option value="たまたま通りかかった">たまたま通りかかった</option>
					<option value="紹介">その他</option>
				</select>
			</dd>
			<dt class="form-title">志望動機</dt>
			<dd class="form-detail">
				<ul>
					<li><label for="company"><input type="radio" name="reason" id="company" class="form-parts__radio">起業をしたい</label></li>
					<li><label for="jobchange"><input type="radio" name="reason" id="jobchange" class="form-parts__radio">チーズ系企業に就職・転職したい</label></li>
					<li><label for="stepup"><input type="radio" name="reason" id="stepup" class="form-parts__radio">チーズと関わる仕事をしており、<br>仕事に生かしたい</label></li>
					<li><label for="knowledge"><input type="radio" name="reason" id="knowledge" class="form-parts__radio">チーズの教養を身につけたい</label></li>
				</ul>
			</dd>
			<dt class="form-title">詳細</dt>
			<dd class="form-detail"><textarea name="detail" id="detail" cols="30" rows="10" class="form-parts__textarea"></textarea></dd>
		</dl>
		<p class="text-center"><input type="submit" value="送信する" class="btn btn-submit"></p>
		
<!--	</form>-->
</form>
<ul>
</ul>
</body>
</html>