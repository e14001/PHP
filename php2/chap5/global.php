<?php

$dinner = 'Curry Cuttlefish';

function vegetarian_dinner(){
	global $dinner;
	print "Dinner was $dinner, but now it is";
	$dinner = 'Sauteed Pea Shoots';
	print $dinner;
	print "<br />\n";
}

print "Regular Dinner is $dinner.<br />\n";
vegetarian_dinner();
print "Regular dinner is $dinner";