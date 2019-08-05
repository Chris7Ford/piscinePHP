#!/usr/bin/php
<?php

function error_found()
{
	echo "Wrong Format\n";
	exit();
}

function validate_weekday($day)
{
	$validated = false;
	switch (strtolower($day)) {
		case "lundi":
		case "mardi":
		case "mercredi":
		case "jeudi":
		case "vendredi":
		case "samedi":
		case "dimanche":
			$validated = true;
			break ;
	}
	if (!$validated)
		error_found();
}

function validate_day_month($day, $month_passed) {
	$validated = false;
	$max = 0;
	$month = "";
	if (preg_match('/[0-3][0-9]/', $day))
		$validated = true;
	if ($month_passed == "janvier")
	{
		$month = "01";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "mars")
	{
		$month = "03";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "mai")
	{
		$month = "05";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "julliet")
	{
		$month = "07";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "août")
	{
		$month = "08";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "octobre")
	{
		$month = "10";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "décembre")
	{
		$month = "12";
		$max = 31;
		$validated = true;
	}
	else if ($month_passed == "septembre")
	{
		$month = "09";
		$max = 30;
		$validated = true;
	}
	else if ($month_passed == "juin")
	{
		$month = "06";
		$max = 30;
		$validated = true;
	}
	else if ($month_passed == "novembre")
	{
		$month = "11";
		$max = 30;
		$validated = true;
	}
	else if ($month_passed == "avril")
	{
		$month = "04";
		$max = 30;
		$validated = true;
	}
	else if ($month_passed == "février")
	{
		$month = "02";
		$max = 28;
		$validated = true;
	}
	if (intval($day) > $max)
		$validated = false;
	if (!$validated)
		error_found();
	return ($month);
}

function validate_year($year)
{
	if (preg_match('/^\d{4}?$/', $year))
		return ($year);
	error_found();
}

function validate_time($time)
{
	if(preg_match('/^[0-1][0-9][:][0-5][0-9][:][0-5][0-9]?$/', $time))
		return ($time);
	error_found();
}

if (isset($argv[1]))
{
	date_default_timezone_set('Europe/Paris');
	$validated = true;
	$array = explode(" ", $argv[1]);
	if (sizeof($array) != 5)
		error_found();
	validate_weekday($array[0]);
	$month = validate_day_month($array[1], $array[2]);
	$day = $array[1];
	$year = validate_year($array[3]);
	$time = validate_time($array[4]);
#	$date = "31 February 2019 12:02:21";
	$date = $year."-".$month."-".$day." ".$time;
	echo strtotime($date)."\n";
}
?>
