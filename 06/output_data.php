<?php
$name=$_POST["name"];
$kana=$_POST["kana"];
$mailaddress=$_POST["mailaddress"];
$trigger=$_POST["trigger"];
$reason=$_POST["reason"];
$detail=$_POST["detail"];
?>


<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style_output.css">
<title>File書き込み</title>
</head>
<body>
アンケートを登録しました。<br>

</body>
<?php
$str = $name.",".$kana.",".$mailaddress.",".$trigger.",".$reason.",".$detail;
$file = fopen("data/data.csv","a");	// ファイル読み込み rで読み込み
flock($file, LOCK_EX);			// ファイルロック
fwrite($file, $str."\n");
flock($file, LOCK_UN);			// ファイルロック解除
fclose($file);
?>

<table class="table_title">
<tr>
<th>名前</th>    
<th>カナ</th>
<th>メール</th>
<th>職業</th>
<th>配信</th>
<th>コメント</th>     
</tr>    

 <?php       
$lines = file('data/data.csv');
foreach($lines as $line){
	$data = explode(',',$line);

    ?>
	
<!--
//	echo '<table>\n';
//	echo ' 名前：',$data[0];
//	echo ' カナ：',$data[1];
//    echo ' メール：',$data[2];
//    echo ' きっかけ：',$data[3];
//    echo ' 配信希望：',$data[4];
//    echo ' コメント：',$data[5];
//	echo '</table>\n';
-->
<tr>
<td><? echo $data[0] ?></td>
<td><? echo $data[1] ?></td>
<td><? echo $data[2] ?></td>
<td><? echo $data[3] ?></td>
<td><? echo $data[4] ?></td>
<td><? echo $data[5] ?></td>
</tr>

<?        
 }
    
  ?>  
</html>