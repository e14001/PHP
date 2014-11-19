<?php
$meal = array('breakfast' => 'Walnut Bun',
				'lunch' => 'Cashew Nuts and White Mashrooms',
				'snack' => 'Dried Mulberries',
				'dinner' => 'Eggplant with Chili Sause');

$mealjp = array('朝食' => 'トースト',
				'昼食' => 'スパゲッティ',
				'おやつ' => 'ドーナツ',
				'夕食' => 'すき焼き');

print "<table border='1'>\n";


foreach($meal as $key => $value){
	print "<tr><td>$key</td><<td>$value</td></tr>\n";
}
foreach($mealjp as $key => $value){
	print "<tr><td>$key</td><<td>$value</td></tr>\n";
}

print "</table>\n";