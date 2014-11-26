<?php
// フォームがサブミットされたときに何かをする 
function process_form(){
	print "Hello, ". $_POST['my_name'];
}

// フォームを表示
function show_form($errors = ''){
	// 何かエラーが渡されると、それを出力
	if($errors){
		print '以下のエラーを修正してください:<ul><li>';
		print implode('</li><li>', $errors);
		print '</li></ul>';
	}
?>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
Your name: <input type="text" name="my_name">
<br />
<input type="submit" value="Say Hello">
<input type="hidden" name="_submit_check" value="1">
</form>

<?php
}

function validate_form(){
	// エラーメッセージを格納する配列を初期化
	$errors = array();
	// my_nameの長さは少なくとも3文字あるか？
	if(mb_strlen($_POST['my_name']) < 3){
		$errors[]= '名前は3文字以上で入力してください';
	}
	// エラーメッセージの配列（エラーがなければ空）を返す
	return $errors;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームのひな形</title>
</head>
<body>
	<?php
	// サブミットされたフォームパラメータをベースになすべきことをするロジック
	if(array_key_exists('_submit_check', $_POST)){ // サブミットされた？
		if($form_errors = validate_form()){ //  $_POSTのチェック
			show_form($form_errors); // フォームを再表示
		}else{
			process_form(); // 処理を実行
		}
	}else{
			show_form(); // フォームを表示
	}
	?>
</body>
</html>