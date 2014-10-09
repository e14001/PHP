<?php
function bmi($height, $mass){
	$height = $height/ 100;
	$mass = $mass /($height *$height);
	return $mass;
}

function h($str){
	return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>BMI値を求めます</title>
</head>
<body>
<?php
if(isset($_POST["submit"])){
	//BMI値を計算する
	$bmi = bmi($_POST["height"], $_POST["mass"]);
	print "あなたのBMI値は" .h($bmi) ."です";
}else{
	print "BMI値を計算します";
}
?>


	<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post">
	身長<br />
	<input type="text" name="height"><br />
	体重<br />
	<input type="text" name="mass"><br />
	<input type="submit" name="submit" value="送信"><br />
	</form>
</body>
</html>