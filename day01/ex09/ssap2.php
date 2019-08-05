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
	$final = [];
	foreach($array as $string)
	{
		$elem = $string;
		$elem = explode(" ", $elem);
		$elem = array_filter($elem, "is_not_empty");
		$elem = array_values($elem);
		$answer = array_merge($answer, $elem);
	}
	natcasesort($answer);
	foreach($answer as $key=>$val)
	{
		if (ctype_alpha($val[0]))
			array_push($final, $val);
	}
	foreach($answer as $key=>$val)
	{
		if (is_numeric($val[0]))
			array_push($final, $val);
	}
	foreach($answer as $key=>$val)
	{
		if (!ctype_alpha($val[0]) && !is_numeric($val[0]))
			array_push($final, $val);
	}
	foreach($final as $string)
		echo $string."\n";
}
?>
