#!/usr/bin/php
<?php
if (isset($argv[1]))
{
	$string = preg_replace("/[ \t]+/", " ", $argv[1]);
	echo trim($string)."\n";
}
?>
