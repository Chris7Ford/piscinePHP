#!/usr/bin/php
<?php
while (1)
{
	echo("Enter a number: ");
	$input = fgets(STDIN);
	if ($input == null)
		break ;
	$input = str_replace("\n", "", $input);
	if (is_numeric($input))
	{
		$answer = intval($input) % 2 ? "odd" : "even";
		echo "The number ".$input." is ".$answer;
	}
	else
		echo "'".$input."' is not a number";
	echo "\n";
}
echo "\n";
?>
