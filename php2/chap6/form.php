<?php
// ホームヘルパー関数のコードをインクルード
require_once 'formhelpers.php';
// show_form(), validate_form()及びprocess_form()で、参照するので以下の配列はグローバル宣言する

$main_dishes = array('katsu' => 'カツ丼',
				'ten' => '天丼',
				'oya' => '親子丼',
				'tanin' => '他人丼',
				'soba' => '沖縄そば',
				'maku' => '幕の内');

$sweets = array('Cream Puff' => 'シュークリーム',
				'Short Cake' => 'ショートケーキ', 
				'Mont Branc' => 'モンブラン', 
				'Chocolate Cake' => 'チョコレートケーキ');


// フォームがサブミットされたときに何かをする 
function process_form(){
	//print "Hello, ". $_POST['my_name'];

	global $sweets, $main_dishes;

	// スイーツと料理の正式名称を見つける
	$sweet = $sweets[$_POST['order']];
	$main_dish_1 = $main_dishes[$_POST['main_dish'][0]];
	$main_dish_2 = $main_dishes[$_POST['main_dish'][1]];
	if(isset($_POST['delivery']) && $_POST['delivery'] == 'yes'){
		$delivery = 'do';
	}else{
		$delivery = 'do not';
	}

	// 注文メッセージのテキストを組み立てる
	$message = <<<_ORDER_
	Thank you for your order, $_POST[my_name].
	Your requested the $_POST[size] size of $sweet , $main_dish_1 , and $main_dish_2 .
	You $delivery want delivery.
_ORDER_;

	if(mb_strlen(trim($_POST['comments']))){
		$message .= 'Your comments:' . $_POST['comments'];
	}

	// メッセージをメールで送信
	mail('e14001@std.it-college.ac.jp', 'New Order', $message);

	// メッセージを出力しますが、HTMLのエンティティはすべてエンコードして、改行は<br />タグに変更
	print nl2br(h($message));
}

// フォームを表示
function show_form($errors = ''){
	global $main_dishes, $sweets;

// フォームがサブミットされたら、サブミットされたパラメータからデフォルト値を取得
if(isset($_POST['_submit_check']) && $_POST['_submit_check'] == 1){
	$defaults = $_POST;
	if(!isset($_POST['delivery'])){
		$defaults['delivery'] = 'no';
	}
}else{
	$defaults = array();
	$defaults['my_name'] = '';
	$defaults['email'] = '';
	$defaults['age'] = '';
	$defaults['order'] = 'Cream Puff';
	$defaults['main_dish'] = array('katsu');
	$defaults['delivery'] = 'yes';
	$defaults['size'] = 'medium';
	$defaults['comments'] = '';
}

	// 何かエラーが渡されると、それを出力
	if($errors){
		$error_text = '<tr><td>エラーを修正してください:';
		$error_text .= '</td><td><ul><li>';
		$error_text .=  implode('</li><li>', $errors);
		$error_text .= '</li></ul></td></tr>';
	}else{
		// エラーがなければ、$error_textはブランクにする
		$error_text = '';
	}
?>

<form method="POST" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>">
<table>
<?php print $error_text; ?>

<tr>
<td>お名前:</td> 
<td><?php input_text('my_name', $defaults); ?></td>
</tr>

<tr>
<td>メールアドレス:</td>
<td><?php input_text('email', $defaults); ?></td>
</tr>

<tr>
<td>年齢:</td>
<td><?php input_text('age', $defaults); ?></td>
</tr>

<tr><td>Size:</td>
<td>
<?php input_radiocheck('radio', 'size', $defaults, 'small'); ?>Small<br />
<?php input_radiocheck('radio', 'size', $defaults, 'medium'); ?>Medium<br />
<?php input_radiocheck('radio', 'size', $defaults, 'large'); ?>Large
</td></tr>

<tr>
<td>料理を選択してください (複数選択可) :</td> 
<td>
<?php input_select('main_dish', $defaults, $main_dishes, true); ?>
</td>
</tr>

<tr>
<td>デザート選択してください:</td>
<td>
<?php input_select('order', $defaults, $sweets); ?>
</td>
</tr>

<tr>
<td>デリバリーしますか？</td>
<td>
<?php input_radiocheck('checkbox', 'delivery', $defaults, 'yes'); ?>Yes
</td>
</tr>

<tr>
<td>その他の要望<br />
デリバリーしてほしい場合は、ここに住所を記入してください :</td>
<td>
<?php input_textarea('comments', $defaults); ?>
</td>
</tr>


<tr>
<td colspan="2" align="center">
<?php input_submit('save', 'order'); ?>
</td>
</tr>

</table>
<input type="hidden" name="_submit_check" value="1">
</form>

<?php
}

function validate_form(){
	global $main_dishes;

	// エラーメッセージを格納する配列を初期化
	$errors = array();

	// my_nameの長さは少なくとも3文字あるか？
	if(mb_strlen(trim($_POST['my_name'])) < 3){
		$errors[]= '名前は3文字以上で入力してください';
	}

	// メールアドレスが入力されているかチェック
	if(strlen($_POST['email']) == 0){
		$errors[] = 'メールアドレスを入力してください';
	}elseif(!preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $_POST['email'])){
	$errors[] = '正しいメールアドレスを入力してください';
}

	// 整数チェック
	if($_POST['age'] != strval(intval($_POST['age']))){
		$errors[] = '年齢は数値で入力してください';
	}elseif($_POST['age'] < 18 || $_POST['age'] >65){
		$errors[] = '年齢は18歳以上65歳以下で入力してください';
	}

	// sizeが必要
	if(($_POST['size'] != 'small') && ($_POST['size'] != 'medium') &&
		($_POST['size'] != 'large')){
		$errors[] = 'サイズを正しく選択してください';
	}

	// orderでの選択のチェック
	if(!array_key_exists($_POST['order'], $GLOBALS['sweets'])){
		$errors[] = 'メニューから選択してください';
	}

	// メインディッシュが2つ選択されていること
	if(count($_POST['main_dish']) != 2){
		$errors[] = '料理は2つ選択してください';
	}else{
		// 2つ選択されているので、その内容をチェック
		// メニューにある料理かどうか
		if(!(array_key_exists($_POST['main_dish'][0], $main_dishes) &&
			array_key_exists($_POST['main_dish'][1], $main_dishes))){
			$errors[] = '料理はメニューから選択してください';
		}
	}

	// deliveryがチェックされていたら、コメントには何かが含まれる
	if(isset($_POST['delivery']) && ($_POST['delivery'] == 'yes') && (!mb_strlen(trim($_POST['comments'])))){
		$errors[] = 'デリバリーを選択した際には、コメントに住所を記入してください';
	}

	// エラーメッセージの配列（エラーがなければ空）を返す
	return $errors;
}

// function h($str){
// 	return htmlentities($str, ENT_QUOTES, 'UTF-8');
// }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>フォームのひな形</title>
</head>
<body>
	<?php
	// メインページのロジック:
	// - フォームがサブミットされた場合は検証して処理、
	// - サブミットされなかった場合はフォームを表示
	// サブミットされたフォームパラメータをベースになすべきことをするロジック
	if(array_key_exists('_submit_check', $_POST)){
		// サブミットされたデータが正しければ、それを処理
		if($form_errors = validate_form()){ 
			show_form($form_errors); // フォームを再表示
		}else{
			process_form(); // 処理を実行
		}
	}else{
		// サブミットされていなければフォームを表示
			show_form(); // フォームを表示
	}
	?>
</body>
</html>