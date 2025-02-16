<?php
function randomString($numOfChars = 500) {
	$collection = [];
	$i = 0;
	while ($i < $numOfChars) {
		$collection[] = chr(rand(97, 122));
		$i++;
	}
	return implode("", $collection);
}
print randomString(900);
?>