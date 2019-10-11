#!/usr/bin/php
<?php
	if ($argc != 2)
		exit("Incorrect Parameters\n");
	$i = 1;
	$string = preg_replace('/\s+/', '', $argv[1]);
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
		exit("Syntax Error\n");
?>