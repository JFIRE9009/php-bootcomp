#!/usr/bin/php
<?php
	$i = 1;
	while ($i < $argc)
	{
		$str.=" ".$argv[$i];
		$i++;
	}
	$str = array_filter(explode(" ", $str));
	natcasesort($str);
	foreach ($str as $new)
		echo $new."\n";
?>