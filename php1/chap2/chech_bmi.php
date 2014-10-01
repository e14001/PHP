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

function process_form(){

$bmi = bmi($_POST['height'], $_POST['mass']);

$bmi = round($bmi, 1);

print "BMI値は{$bmi}で";

if($bmi < 18.5){
	print "痩せ過ぎです";
	}else if($bmi > 25){
	print "太り過ぎです";
	}else {
	print "標準です";
	}
}

function show_form(){
?>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
身長:
<input type="text" name="height">
<br />体重:
<input type="text" name="mass">
<br />
<input type="submit" value="BMI値計算">
<input type="hidden" name="_submit_check" value="1">
</form>

<?php
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>関数の動作確認</title>
</head>
<script>
	function home(){
		//window.alert("button click");
		location.reload();
	}
</script>
<body>

<?php

if(isset($_POST['_submit_check'])){

process_form(); // BMI値を計算する

//echo "<br /><a href=" .$_SERVER['SCRIPT_NAME'] .">戻る</a>";
echo "<br /><button onclick='home()'>戻る</button>";

}else{ 

	show_form(); // 身長と体重を入力するフォームを表示する


} ?>

</body>
</html>