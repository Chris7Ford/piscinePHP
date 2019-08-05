#!/usr/bin/php
<?php

function make_it_big($string) {
	return (strtoupper($string[0]));
}

if (isset ($argv[1]))
{
	$file = file_get_contents($argv[1]);
	$array = explode("</a>", $file);
	$deep_array = [];
	foreach ($array as $k => $v)
	{
		$deep_array[$k] = explode("<a", $v);
	}
	foreach ($deep_array as $k => $v)
	{
		foreach ($v as $kk => $vv)
		{
			if (trim($vv)[0] != '<')
			{
				if (preg_match("/[title] *= *\"/", $vv))
					$deep_array[$k][$kk] = preg_replace_callback('/".*"/', "make_it_big", $vv);
				if (preg_match("/>.*</", $vv))
					$deep_array[$k][$kk] = preg_replace_callback('/>.*</', "make_it_big", $deep_array[$k][$kk]);
				else if (preg_match("/>.*$/", $vv))
					$deep_array[$k][$kk] = preg_replace_callback('/>.*$/', "make_it_big", $deep_array[$k][$kk]);
			}
		}
	}
	foreach ($deep_array as $k => $v)
	{
		$deep_array[$k] = implode("<a", $v);
	}
	$answer = implode("</a>", $deep_array);
	echo $answer;
}
?>
