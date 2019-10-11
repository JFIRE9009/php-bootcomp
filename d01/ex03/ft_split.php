<?php
	function ft_split($charstr)
	{
		$charstr = (array_filter(explode(' ', $charstr)));
		sort($charstr);
		return ($charstr);
	}
?>