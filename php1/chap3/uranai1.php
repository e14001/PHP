<?php
// 結果配列を用意する
$uranai[1] = "大吉";
$uranai[2] = "中吉";
$uranai[3] = "小吉";
$uranai[4] = "末吉";
$uranai[5] = "大凶";

// mt_rand() 関数の結果を$key変数に記憶
$key = mt_rand(1,5); 
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>おみくじ</title>
</head>
<body>
	// 結果を出力
<p>あなたが引いたおみくじの結果は、[<?php print $uranai[$key]; ?> です</p>
<!--<a href="<php echo $SERVER['SCRIPT_NAME']; ?>"もう一度</a>-->
<button onclick="location.reload()">もう一度</button>

</body>
</html>