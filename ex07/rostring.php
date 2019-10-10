#!/usr/bin/php
<?php
	$arr = array_filter(explode(" ", $argv[1]));
	$arr1 = array_shift($arr);
	array_push($arr, $arr1);
	echo implode(" ", $arr). "\n";
?>