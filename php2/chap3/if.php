<?php
$firstname = 'jun';
$lastname = 'akamine';
if(isset($firstname) && isset($lastname)){
//if($firstname == 'akamine' && $lastname == 'akamine'){
if(strcmp($firstname, 'akamine') == 0 && strcmp($lastname, 'akamine') == 0){
	print 'Welcome abroad, trusted user.';
}elseif($firstname == 'jun'){
	print 'Hello jun!!!';
}else{
	print 'Howdy, stranger.';
	}
}else{
	print '$firstname is not exist.';
}

$age = 36;
//年齢($age)のチェック(15歳以上40歳未満 ) => 否定(15歳未満40歳以上)
if(!($age >= 15 && $age < 40)){
	print '<p>OKです</p>';
}else{
	print '<p>NGです</p>';
}