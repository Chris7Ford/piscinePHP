<?php
function is_not_empty($elem)
{
	return($elem !== "");
}

function ft_split($string)
{
	$arr = explode(" ", $string);
	sort($arr);
	$arr = array_filter($arr, "is_not_empty");
	$arr = array_values($arr);
	return($arr);
}
?>
