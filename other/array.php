<?php
$arr = ['a', 'b', 'c'];
$arr[] = "d";
//追加の仕方
// echo $arr [1] ;
//echoは文字専用となっている、中身をみるのには使えない
echo "<pre>";
var_dump($arr);
//中身を見るにはvar dump
echo "</pre>";
//preを入れると改行してくれる

$str = "one, two, three";
$result = explode(",", $str);
//重要：カンマで分けてあげる
echo "<pre>";
var_dump($result);
echo "</pre>";


?>