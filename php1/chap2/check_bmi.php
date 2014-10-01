<?php 
function sayHello($name){
	$aisatsu = "こんにちは! {$name}さん";
	return $aisatsu;
}
function bmi($height, $mass){//身長と体重
	$height = $height/100;
	$mass = $mass / ($height * $height);
	return $mass; // BMI値を返す
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>関数の動作確認</title>
</head>
<body>
	<p><?php echo sayHello("海"); ?></p>
	<p><?php echo sayHello("メラ"); ?> あなたのBMI値は<?php echo bmi(170, 50); ?>です。</p>
</body>
</html>