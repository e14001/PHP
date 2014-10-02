<?php
$saikoro = mt_rand(1,6);
$saikoro2 = mt_rand(1,6);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>サイコロ</title>
</head>
<body>
	<p>サイコロの目は「<?php echo $saikoro; ?>」、「<?php echo $saikoro2; ?>」です。
	<?php if($saikoro === $saikoro2): ?>
	<br />ゾロ目です！
<?php endif; ?>
	</p>
	<!--<a href="<?php echo $_SERVER['SCRIPT_NAME']; ?>">もう一度</a>-->
	<button onclick="location.reload()">もう一度</button>
</body>
</html>