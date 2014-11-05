<?php
require_once 'MDB2.php';

$user = 'test';
$pass = 'pass';
$dbname = 'testphp';

// データベースへの接続
$db = MDB2::connect ("mysql://$user:$pass@localhost/$dbname");

// 失敗するとエラーメッセージを表示して終了
if(MDB2::isError($db)){die("Can't connect:" . $db->getMessage()); }

//ここまで来たら、接続成功
echo '接続成功<br />';

// この後のデータベースエラーに関してはメッセージを出力して抜け出す
$db->setErrorHandling(PEAR_ERROR_DIE);

// 文字列キー付き配列にフェッチモードを変更
$db->setFetchMode(MDB2_FETCHMODE_ASSOC);

$sql = ' select * from departments order by deptno;';
$rows = $db->queryAll($sql);

// submitボタンが押されたら書き込み
if(isset($_POST['submit'])){

// フォームに入力された値を$defaultsに待避
$defaults = $_POST;

// フォームに入力された値のチェック
//$errors = check();
$errors = array();

// エラーがなければ追加処理
if(count($errors) == 0){
	
	// deptnoの最大値を取得
	$max_deptno = $db->queryOne('SELECT MAX(deptno) from departments');
	
	// departments表に追加(deptnoは現在の最大値+10を設定)
	$sth = $db->prepare('INSERT INTO departments(deptno, dname, loc) values(?,?,?)');
	$sth->execute(array($max_deptno+10, $_POST['dname'], $_POST['loc']));
}

}else{
	$defaults = array();
	$defaults['dname'] = '';
	$defaults['loc'] = '';
}

/*
foreach($rows as $row){
	var_dump($row);
	echo '<br />';
}
*/

?>



<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>department表について</title>
</head>
<body>

<form action="<?php echo$_SERVER['SCRIPT_NAME']; ?>" method='POST'>
部門名:<input type="text" name="dname" value='' />
場所:<input type="text" name="loc" value='' />
<input type="submit" name="submit" value='追加' />
</form>
<hr />
<table border='1'>
<tr>
<th>部門番号</th>
<th>部門名</th>
<th>場所</th>
</tr>
<?php foreach($rows as $row){ ?>
<tr>
<td><?php echo $row['deptno']; ?></td>
<td><?php echo $row['dname']; ?></td>
<td><?php echo $row['loc']; ?></td>
</tr>
<?php } ?>
</table>
	
</body>
</html>