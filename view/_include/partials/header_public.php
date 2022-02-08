<?php
$text_arr = array(
	'Web Dev',
	'Internet Fox',
	'Slacker',
	'Bad to the Bone',
	'Bad at Games',
	'Time-waster',
	'Coffee-consumer',
//    'Lucio Main',
	'No one of Importance',
	'Never Sleeps',
	'Key Smasher',
	'Soft Friend',
	'Photo-taker'
);
shuffle($text_arr);
?>

<h1>Mervyn Fox</h1>
<p><?= implode(' | ', array_slice($text_arr, 0, 3)) ?></p>