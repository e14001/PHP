<?php
function page_header($title, $color = 'cc3399'){
	print '<html><head><meta charset="UTF-8"><title>Welcome to ' . $title . '</title></head>';
	print '<body bgcolor="#' . $color . '">';
}

function page_footer(){
	print '<hr />Thanks for visiting.';
	print '</body></html>';
}

function restaurant_check($meal, $tax, $tip){
	$tax_amount = $meal * ($tax / 100);
	$tip_amount = $meal * ($tip / 100);
	$total_amount = $meal + $tax_amount + $tip_amount;

	return $total_amount;
}


// page_header('JUN site','66cc66');
page_header('JUN site');

$user = 'JUN';
print "<p>Welcome , $user</p>";
$total = restaurant_check(1522, 8.25, 15);
$total = floor($total);
$total = number_format($total);
?>


あなたのトータルの食事料金は:「<?php echo $total; ?>」です。

<?php
page_footer();
?>