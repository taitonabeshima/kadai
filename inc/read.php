<?php
$name = $_POST["name"];
$mail = $_POST["mail"];
//post.phpからデータを持ち出しましたよ
$c = ",";

//文字作成
$str = date("Y-m-d H:i:s").$c.$name.$c.$mail;
//File書き込み
$file = fopen("data/data.txt","a");	// ファイル読み込み
// a はappendの追記
fwrite($file, $str."\n");
// \nは改行
fclose($file);
?>