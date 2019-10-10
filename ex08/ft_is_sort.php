<?php
	function ft_is_sort($str)
	{
		$newstr = $str;
		sort($newstr);
		if ($newstr == $str)
			return (1);
		else
			return (0);
	}
?>