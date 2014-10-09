<?php

//var_dump($_POST);

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームの練習</title>
</head>
<body>
	<form action="check.php" method="post">
	
	名前<br />
	<input type="text" name="name"><br />
	パスワード<br />
	<input type="password" name="password"><br />
	備考<br />
	<textarea name="note" cols="40" rows="5">
	</textarea><br />
	性別<br />
	<input type="radio" name="sex" value="1">男性
	<input type="radio" name="sex" value="2">女性
	<input type="radio" name="sex" value="9">回答しない<br />
	都道府県<br />
	<select name="pref">
		<option value="1">北海道</option>
		<option value="2">青森県</option>
		<option value="3">岩手県</option>
		<option value="47">沖縄県</option>
	</select><br />
	趣味<br />
	<input type="checkbox" name="hobby[]" value="1">ネット
	<input type="checkbox" name="hobby[]" value="2">読書
	<input type="checkbox" name="hobby[]" value="3">ショッピング
	<input type="checkbox" name="hobby[]" value="4">サイクリング
	<input type="checkbox" name="hobby[]" value="5">投資
	<br />
		
	<input type="submit" name="submit" value="データ送信">
	</form>
</body>
</html>