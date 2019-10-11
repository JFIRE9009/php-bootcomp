#!/usr/bin/php
<?php
	function ft_ssap_sort($str, $str2)
	{
		$i = 0;
		$letters = "abcdefghijklmnopqrstuvwxyz1234567890!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
		while (($i < strlen($str) || $i < strlen($str2)))
		{
			$pos = stripos("$letters", $str[$i]);
			$pos2 = stripos("$letters", $str2[$i]);
			if ($pos > $pos2)
				return (1);
			else if ($pos < $pos2)
				return (-1);
			else
				$i++;
		}
	}
	if ($argc > 1)
	{
		$i = 1;
		$count = 0;
		while ($argv[$i])
		{
			$j = 0;
			$string = preg_replace('/\s+/', ' ', trim($argv[$i]));
			$string2 = explode(" ", $string);
			while ($string2[$j])
			{
				$s_string[$count] = $string2[$j];
				$j++;
				$count++;
			}
			$i++;
		}
		usort($s_string, "ft_ssap_sort");
		$i = 0;
		while ($s_string[$i])
		{
			echo($s_string[$i]."\n");
			$i++;
		}
	}
?>