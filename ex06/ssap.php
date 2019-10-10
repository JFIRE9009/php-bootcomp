#!/usr/bin/php
<?php
	$i = 1;
	while ($i < $argc)
	{
		$str.=" ".$argv[$i];
		$i++;
	}
	$str = array_filter(explode(" ", $str));
	sort($str);
	foreach ($str as $new)
		echo $new."\n";
?>