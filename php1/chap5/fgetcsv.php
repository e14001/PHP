<meta charset = "UTF-8">

<?php
// 掲示板のコメントを保持するファイルを指定
$bbs_file = "bbs.csv";

// ファイルを読み込みモードで開く
$handle = fopen($bbs_file, "r");

// 開いたポインタからデータを１行ずつ取得して配列に格納
while($csv = fgetcsv($handle)){
	$record["name"] = $csv[0];
	$record["comment"] = $csv[1];
	$record["time"] = $csv[2];
	$records[] = $record;
}

// ファイルを閉じる
fclose($handle);

var_dump($records);
?>