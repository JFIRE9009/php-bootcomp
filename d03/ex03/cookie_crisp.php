<?php
	if($_GET["action"] && $_GET["name"])
	 {
		$chocolate_chip = $_GET["name"];
		$oatmeal = $_GET["value"];
		if ($_GET["action"] == "set")
			setcookie($chocolate_chip, $oatmeal, time() + (86400 * 30));
		else if ($_GET ["action"] == "get")
			echo $_COOKIE[$chocolate_chip];
		else if ($_GET["action"] == "del")
			setcookie($chocolate_chip, $oatmeal, time() - (86400 * 30));
	}
?>