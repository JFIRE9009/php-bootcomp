#!/usr/bin/php
<?php
	while (!feof(STDIN)) 
	{
		echo "enter a number: ";
		$in = rtrim(fgets(STDIN));
		if (is_numeric($in) == true)
		{
			if ($in % 2 == 0)
				echo "The number $in is even\n";
			else
				echo "The number $in is odd\n";
		}
		else if (feof(STDIN))
			echo "\n";
		else
			echo "'$in' is not a number\n";
	}
?>