<?php
//include("common.php");
require_once 'common.php';

// 結果配列を用意する
$uranai[] = "大吉です。おめでとうございます。";
$uranai[] = "大吉です。臨時収入があるかもしれません。";
$uranai[] = "大吉です。今日は楽しく過ごせるでしょう。";
$uranai[] = "中吉です。街に出かけるといいことがあるでしょう。";
$uranai[] = "小吉です。今日はまったり過ごしてみては。";
$uranai[] = "末吉です。PHPの勉強をするといいことがあるでしょう。";
$uranai[] = "大凶です。今日は自宅でゆっくり過ごしてください。";


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>おみくじ</title>
</head>
<body>
<?php //結果を出力 ?>
<p>あなたが引いたおみくじの結果は、[<?php print select_random($uranai); ?>] </p>
<!--<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>"もう一度</a>-->
<button onclick="location.reload()">もう一度</button>

</body>
</html>