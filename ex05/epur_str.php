#!/usr/bin/php
<?php
	echo $argv[1] = trim((preg_replace('/\s+/', ' ', $argv[1]))) . "\n";
?>