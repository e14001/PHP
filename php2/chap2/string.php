<?php
$test = 'testtesttest!!!';
print 'We\'ll each have a bowl of soup. <br />';
print "We'll each have a bowl of soup. $test<br />";
$price = 5;
$tax = 0.075;
printf('The dish costs $%.2f<br />', $price * (1 + $tax));
print 'The dish costs'. $price * (1 + $tax) . '<br />';
$zip = '6520';
$month = 2;
$day = 6;
$year = 2007;
printf('ZIP is %05d and the date is %02d/%02d/%d<br ?>', $zip, $month, $day, $year);
$min = -40;
$max = 40;
printf('The computer can operate between %+d and %+d degress Celsius. <br />', $min, $max);