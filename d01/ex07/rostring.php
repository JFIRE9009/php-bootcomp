#!/usr/bin/php
<?php
	$arr = array_filter(explode(" ", $argv[1]));
	$string = array_shift($arr);
	array_push($arr, $string);
	echo implode(" ", $arr). "\n";
?>