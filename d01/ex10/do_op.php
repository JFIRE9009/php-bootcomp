#!/usr/bin/php
<?php
	if ($argc != 3)
		exit("Incorrect Parameters\n");
	$string = preg_replace('/\s+/', '', $argv[1]);
	$string .= preg_replace('/\s+/', '', $argv[2]);
	$string .= preg_replace('/\s+/', '', $argv[3]);
	if ($string[1] == '+')
		echo $string[0] + $string[2]."\n";
	else if ($string[1] == '-')
		echo $string[0] - $string[2]."\n";
	else if ($string[1] == '*')
		echo $string[0] * $string[2]."\n";
	else if ($string[1] == '/')
		echo $string[0] / $string[2]."\n";
	else if ($string[1] == '%')
		echo $string[0] % $string[2]."\n";
	else
		exit("Incorrect Parameters\n");
?>