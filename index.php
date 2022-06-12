

<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="read.css">

<title>POST練習</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>
<body>
<form action="write.php" method="post">
	<!-- どこにとばす？nameとmailとwrite/phpに飛ばす -->
	お名前: <input type="text" name="name">
	EMAIL: <input type="text" name="mail">
	<input type="submit" value="送信">
</form>
<ul>
<li><a href="index.php">index.php</a></li>
</ul>
<div class ="conrainer">
	<!-- <h1>ChartJS Bar Chart with JSON Data API</h1> -->
  <canvas id="canvas"></canvas>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
  <script type="text/javascript" src="custom.js"></script>
</div>

<a href = "data/data.csv" target="_blank"> 表をダウンロード </a>

</body>
</html>


<?php
//file_get_contents()でCSVファイルを取り込んでpreg_split()改行で切る
$contentArray = preg_split('/\n/', file_get_contents("data/data.csv"), -1, PREG_SPLIT_OFFSET_CAPTURE);
$columns = [];  //カラム名リスト用
$maps = [];     //JSON変換用
for($i1 = 0; $i1 < count($contentArray); $i1++){
    if (count($contentArray[$i1]) > 0){ if (strlen($contentArray[$i1][0]) > 0){
        $lineArray = [];  
		 //1行だけ配列でまとめる
        //列取得 count($line) = 2
        // echo $contentArray[$i1][0] . "\n";
        //1行をカンマ区切りを配列に変える
        $col = preg_split('/,/', $contentArray[$i1][0], -1, PREG_SPLIT_OFFSET_CAPTURE);
        for($i2=0; $i2< count($col); $i2++){
            $d1 = trim($col[$i2][0]);
            if (strlen($d1) > 0){//カラム1個づつ取り出して出力
                // echo "Column" . $i . " = " . $d1 . " | ";
                switch($i1){
                case 0:
                    //1行目はカラム名
                    array_push($columns,$d1);
                    break;
                default:
                    //2行目からは、データとして扱う
                    array_push($lineArray, array($columns[$i2] => $d1));
                }   
            }
        }
        echo "\n";
        if (count($lineArray) > 0){
            array_push($maps, $lineArray);
        }
    }}
}
// echo "---- 配列の中身 ----\n";
// var_dump($maps);
// echo "---- json ----\n";


$json_maps = json_encode($maps) . "\n";

$file_json = fopen("data/data.json","w");//ファイル読み込み
fwrite($file_json, $json_maps."\n");
fclose($file_json);

echo $json_maps;

?>

<!-- // // ファイルを読み込みのみでオープンする
// $filename = "data/data.csv";
// // ファイルポインタをファイルの先頭にセットする
// $fp = fopen($filename,"r");
// // 読み込んだ行を分割し配列にして返す

// // 配列を各変数に代入し、出力する
// while (($row = fgetcsv($fp, 4096)) !== false) {
//     list($item_id, $item_name, $item_mail) = $row;
//     echo $item_id.','.$item_name.','.$item_mail.'<br>'."\n";
// }

// fclose($fp);

// // SplFileObjectクラスを使用する
// $file = new SplFileObject('data/data.csv');

// // フラグをセットする
// // CSV列として行を読み込む
// $file->setFlags(SplFileObject::READ_CSV);
// foreach ($file as $row) {
//     list($item_id, $item_name, $item_mail) = $row;
//     echo $item_id.','.$item_name.','.$item_mail.'<br>'."\n";
// }
// ?> -->






// <!-- 
// //<php?????

// //fopen ファイルをオープン
// $filename = "data/data.txt";

// $fp = fopen($filename,"r");
// //file pointerで受け取る

// //fread ファイルからデータを読み込む
// $contents = fread($fp, filesize($filename));
// //filesizeで丸っと読み込む、読み込んだものを変数に入れる

// // var_dump($contents);

// // fcloseでファイルをクローズ
// fclose($fp);

// // $contents2 =file_get_contents($filename);
// // // var_dump($contents2);
// // //こちらのやり方だと一気に読み込むことができる
// // //URLを入れてからreturnしてくれるというのもできる
// // //getしたあとにKeyをふる処理

// // $contents3 = file($filename);
// // // var_dump($contents3);
// // //配列にしてくれる

// $json = json_encode($contents);
// // // print($json);

// // // var_dump($json)
// echo($json);
// ?>

<script>
// $.get($json);
// console.log($contents3); -->


<!-- </script> -->