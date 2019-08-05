#!/usr/bin/php
<?php
function is_not_empty($elem)
{
	return($elem !== "");
}

if (isset($argv[1]))
{
	$string = "";
	$array = explode(" ", $argv[1]);
	$elem = array_shift($array);
	array_push($array, $elem);
	$array = array_filter($array, "is_not_empty");
	$array = array_values($array);
	foreach($array as $word => $value)
		$string .= $value." ";
	$string = trim($string);
	$string .= "\n";
	echo $string;
}
?>
