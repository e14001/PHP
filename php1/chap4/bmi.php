<?php
function bmi($height, $mass){
	$height = $height/ 100;
	$mass = $mass /($height *$height);
	return $mass;
}

function h($str){
	return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

function validate_form(){
	$errors = array();

	//身長
	if($_POST['height'] != strval(floatval($_POST['height']))){
		$errors[] = '身長を正しく入力してください。';
	}

	//体重
	if($_POST['mass'] != strval(floatval($_POST['mass']))){
		$errors[] = '体重を正しく入力してください。';
	}

	return $errors;
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
	if($form_errors = validate_form()){
	//エラーメッセージ表示
	$error_text = '<tr><td>次のエラーを修正してください。';
	$error_text .= '</td><ul><li>';
	$error_text .= implode('</li><li>', $form_errors);
	$error_text .= '</li></ul></td></tr>';
	echo $error_text;

	}else{
	//BMI値を計算する
	$bmi = bmi($_POST["height"], $_POST["mass"]);
	//BMI値を四捨五入して、小数点第１位まで求める
	$bmi = round($bmi, 1);

	print "あなたのBMI値は" .h($bmi) ."です。<br />";
	//判定処理
	//BMI値 < 18.5 => 痩せ過ぎです
	//BMI値 > 25 => 太り過ぎです
	//それ以外 => 標準です

	if($bmi < 18.5){
		print "<div style='color:blue'>痩せ過ぎです。</div>";
	}else if($bmi > 25){
		print "<div style='color:red'>太り過ぎです。</div>";
	}else{
		print "<div style='color:green'>標準です。</div>";
	}
}
}else{
	print "BMI値を計算します。";
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