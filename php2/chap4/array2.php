<?php
// $dishes['Beef Chow Foon'] = 12;
// $dishes['Beef Chow Foon'] ++;
// $dishes['Roast Duck'] = 3;

// $dishes['total'] = $dishes['Beef Chow Foon'] + $dishes['Roast Duck'];

// var_dump($dishes);

// if($dishes['total'] > 15){
// 	print "<p>You ate a lot</p>";
// }

// $meals['breakfast'] = 'Walnut Bun';
// $meals['lunch'] = 'Eggplant with Chili Sause';
// $amounts = array(3,6);

// unset($amounts[3]);

// print "For breakfast, I would like {$meals['breakfast']} and for lunch";
// print "I would like {$meals['lunch']}. I want {$amounts[0]} at breakfast and";
// print "{$amounts[1]} at lunch";

$dimsum = array('Chicken Bun', 'Stuffed Duck Web', 'Turnip Cake');
$menu = implode('*---*', $dimsum);
print $menu;

print '<ul><li>' . implode('</li><li>', $dimsum) . '</li></ul>';

print '<table border="1">';
print '<tr><td>' . implode('</td><td>', $dimsum) . '</td></tr>';
print '</table>';

//区切りがある文字列 -> 配列変換
$fish = 'Bass, Carp, Pike, Flounder';
$fish_list = explode(',', $fish);
print "<p>The secound fish is $fish_list[1]</p>";