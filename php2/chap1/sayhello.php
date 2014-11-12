<?php 

if(isset($_POST['submit'])){
	$msg = "Hello,";
	// 'user'というフォームパラメーターでサブミットされた何かを出力
	$msg .= $_POST['user'];
	$msg .= '!';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームの確認Document</title>
</head>
<body>
<?php 
//フォームがサブミットされた場合に挨拶を出力する
if(isset($_POST['submit'])){
	print $msg . '<br />';
}else{
// そうでなければ、フォームを出力
$script_name = $_SERVER['SCRIPT_NAME'];
print <<<AAAA
<form action="$script_name" method = 'post'>
Your Name:<input type="text" name="user" /><br />
<input type="submit" value="Say Hello" name='submit' />
</form>
AAAA;
} 
print 'The population of the US is about:';
print number_format(285266237);
?>
</body>
</html>