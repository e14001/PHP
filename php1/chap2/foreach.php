<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>foreachの動作確認</title>
</head>
<body>
	<?php
	$member['name'] = "ひよこ";
	$member['age'] = "３ヶ月";
	$member['sex'] = "メス";

	foreach($member as $key => $value){
		print $key. "は" .$value. "です <br>";
	}
	?>
	
</body>
</html>