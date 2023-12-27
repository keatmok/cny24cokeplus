<?php
$fp = fopen('filter.txt', 'r'); 
	if ($fp) {
   		$filter = explode(",", fread($fp, filesize('filter.txt')));
	}

print_r($filter);
?>