<?php
// 結果配列を用意する
$uranai[1] = "大吉です。おめでとうございます。";
$uranai[2] = "大吉です。臨時収入があるかもしれません。";
$uranai[3] = "大吉です。今日は楽しく過ごせるでしょう。";
$uranai[4] = "中吉です。街に出かけるといいことがあるでしょう。";
$uranai[5] = "小吉です。今日はまったり過ごしてみては。";
$uranai[6] = "末吉です。PHPの勉強をするといいことがあるでしょう。";
$uranai[7] = "大凶です。今日は自宅でゆっくり過ごしてください。s";

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
<?php //結果を出力 ?>
<p>あなたが引いたおみくじの結果は、[<?php print $uranai[$key]; ?>] </p>
<!--<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>"もう一度</a>-->
<button onclick="location.reload()">もう一度</button>

</body>
</html>