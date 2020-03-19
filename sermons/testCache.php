<?php

	$cacheFileLocation = './sermonList.php';
	$cacheFile = file_get_contents($cacheFileLocation);
	$cacheFileTwo = fopen($cacheFileLocation, "r");
	$cacheDate = fgets($cacheFileTwo, filesize($cacheFileLocation));
	$currentTime = time();
	$cacheTime = substr($cacheFile, 0, 10);
	$timeDiff = $currentTime - $cacheTime;
	// if the cache file is less than one day old
	if($timeDiff < 86400) {
		echo substr($cacheFile, 10);
	} else {
		echo "old";
	}
?>