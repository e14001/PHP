<meta charset="UTF-8">

<?php
$suu = 10;
$moji = "あいうえお";
$fruit[] = "バナナ";
$fruit[] = "アップル";
$fruit[] = "メロン";
?>

変数$suuの内容: <?php echo $suu; ?><br />
変数$mojiの内容: <?php echo $moji; ?><br />

<?php
foreach($fruit as $f){
	echo $f ."<br />";
}

var_dump($fruit);