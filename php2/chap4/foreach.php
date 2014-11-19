<?php
$meal = array('breakfast' => 'Walnut Bun',
				'lunch' => 'Cashew Nuts and White Mashrooms',
				'snack' => 'Dried Mulberries',
				'dinner' => 'Eggplant with Chili Sause');

$mealjp = array('朝食' => 'トースト',
				'昼食' => 'スパゲッティ',
				'おやつ' => 'ドーナツ',
				'夕食' => 'すき焼き');

//array_key_exists('breakfast', $meal);

$row_color = array('red', 'green');
$color_index = 0;
print "<table border='1'>\n";


foreach($meal as $key => $value){
	print '<tr bgcolor="' . $row_color[$color_index] . '">';
	print "<td>$key</td><<td>$value</td></tr>\n";
	$color_index = 1 - $color_index;
}

foreach($mealjp as $key => $value){
	print '<tr bgcolor="' . $row_color[$color_index] . '">';
	print "<td>$key</td><<td>$value</td></tr>\n";
	$color_index = 1 - $color_index;
}

print "</table>\n";