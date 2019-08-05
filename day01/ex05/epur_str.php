#!/usr/bin/php
<?php
function is_not_empty($elem)
{
	return($elem !== "");
}
if (isset($argv[1]))
{
	$string = $argv[1];
	$string = explode(" ", $string);
	$string = array_filter($string, "is_not_empty");
	$string = array_values($string);
	$string = implode(" ", $string);
	echo "$string\n";
}
?>
