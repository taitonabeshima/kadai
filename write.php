<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
//post.phpからデータを持ち出しましたよ
$c = ",";

//jsonキー
// $datetimesec_key = "time";
// $name_key = "name";
// $e-mail_key ="e-mail";

//文字作成
$str =  date("Y-m-d H:i:s").$c.$name.$c.$mail;

//json形式で文字列を作成
//$json_date = "{"."\"".$datetimesec_key."\"".":".date("Y-m-d H:i:s")"."}";
//$json_name = "{"."\"".$name_key."\"".":".$name"."}";
//$json_mail = "{"."\"".$e-mail_key."\"".":".$mail"."}";

////配列を使うパターン
//扱うデータを配列形式で変数に格納
// $array = array(
//     'dateTimeSec'=> date("Y-m-d H:i:s"),
//     'name' => $name,
//     'mail' => $mail
// );
//変数をjson形式に変換
// $data_json = json_encode($array);

//File書き込み
// $file_json = fopen("data/data.json","a");	// ファイル読み込み
// // a はappendの追記
// fwrite($file_json, $data_json"\n");

////配列を使うパターン

//File書き込み
$file = fopen("data/data.csv","a");	// ファイル読み込み
// a はappendの追記
fwrite($file, $str."\n");
// \nは改行
fclose($file);
?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
<li><a href="input.php">戻る</a></li>
</ul>
</body>
</html>