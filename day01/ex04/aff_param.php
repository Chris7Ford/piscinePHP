#!/usr/bin/php
<?php
	$array = $argv;
	array_shift($array);
	foreach($array as $elem)
	{
		echo $elem."\n";
	}
?>
