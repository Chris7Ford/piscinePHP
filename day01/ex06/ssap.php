#!/usr/bin/php
<?php
function is_not_empty($elem)
{
	return($elem !== "");
}

if (isset($argv[1]))
{
	$array = $argv;
	array_shift($array);
	$answer = [];
	foreach($array as $string)
	{
		$elem = $string;
		$elem = explode(" ", $elem);
		$elem = array_filter($elem, "is_not_empty");
		$elem = array_values($elem);
		$answer = array_merge($answer, $elem);
	}
	asort($answer);
	foreach($answer as $string)
		echo $string."\n";
}
?>
