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

$sql = 'select e.empno, e.ename, e.yomi, e.job, m.ename mgr, e.hiredate, e.sal, e.comm, dname from employees e left outer join employees';
$sql .= ' m on e.mgr = m.empno join departments d on e.deptno = d.deptno order by e.empno';

$rows = $db->queryAll($sql);

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
<title>データベース接続</title>
<style>
	td.right {
		text-align: right;
	}
</style>
</head>
<body>

<table border='1'>
	<tr>
	<th>社員番号</th>
	<th>社員名</th>
	<th>ローマ字</th>
	<th>職種</th>
	<th>上司名</th>
	<th>入社日</th>
	<th>給与</th>
	<th>歩合</th>
	<th>部門名</th>
	</tr>

<?php foreach($rows as $row){ ?>
	<tr>
	<td><?php echo $row['empno']; ?></td>
	<td><?php echo $row['ename']; ?></td>
	<td><?php echo $row['yomi']; ?></td>
	<td><?php echo $row['job']; ?></td>
	<td><?php echo $row['mgr']; ?></td>
	<td><?php echo $row['hiredate']; ?></td>
	<td><?php echo number_format($row['sal']); ?></td>
	<td class='right'><?php echo number_format($row['comm']); ?></td>
	<td><?php echo $row['dname']; ?></td>
	</tr>
<?php } ?>
</table>

</body>
</html>