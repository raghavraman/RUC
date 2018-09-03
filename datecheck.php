<?php
$today = new DateTime('now');
$newYear = new DateTime('2018-04-09 00:01:00');
$result = $today->format('Y-m-d H:i:s');
echo $result;
if ($today > $newYear) {
	echo 'winwin';
}
else{
	echo 'loss';
}
?>