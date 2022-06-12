<?php
$name = $_GET["name"];
$mail = $_GET["mail"];
//phpの便利ツール、get通信、getの中にあるnameを取って下さい




?>
<html>
<head>
<meta charset="utf-8">
<title>GET練習（受信）</title>
</head>
<body>
お名前：<?=$name ?>
Mail：<?= $mail ?>
<!-- //一行だけならセミコロンいらない、<?php echo $mail;?> -->

<ul>
<li><a href="index.php">index.php</a></li>
</ul>
</body>
</html>