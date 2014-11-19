<?php
// $vegetables['corn'] = 'yellow';
// $vegetables['beet'] = 'red';
// $vegetables['carrot'] = 'orange';

$vegetables = array('corn' => 'yellow',
					'beet' => 'red',
					'carrot' => 'orange');

//var_dump($vegetables);

print '<br /><br />';

// $dinner[] = 'Sweet Corn and Asparagus';
// $dinner[] = 'Lemon Chicken';
// $dinner[] = 'Braised Bamboo Fungus';

$dinner = array('Sweet Corn and Asparagus',
				'Lemon Chicken',
				'Braised Bamboo Fungus');

//var_dump($dinner);

$dishes = count($dinner);
//var_dump($dishes);

$row_color = array('red', 'green');
$color_index = 0;
print "<table border='1'>\n";

foreach($dinner as $key => $value){
	print '<tr bgcolor="' . $row_color[$color_index] . '">';
	print "<td>$key</td><<td>$value</td></tr>\n";
	$color_index = 1 - $color_index;
}