
<?php

require_once('./getid3/getid3.php');
$getID3 = new getID3;

	$files = scandir("./audio/"); 
	$files = array_reverse($files);

	function sortFunction($a, $b) {
		$monthA = substr($a, 0, 2);
		$dayA = substr($a, 3, 2);
		$yearA = substr($a, 6, 2);

		$monthB= substr($b, 0, 2);
		$dayB = substr($b, 3, 2);
		$yearB = substr($b, 6, 2);

		$newA = $yearA . $monthA . $dayA;
		$newB = $yearB . $monthB . $dayB;

		return ((int)$newB - (int)$newA);
	}

	function readableDate($date) {
		if(strlen($date) == 8) {
			$monthArray = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec");
			$month = substr($date, 0, 2);
			$day = substr($date, 3, 2);
			$year = substr($date, 6, 2);

			$newMonth = $monthArray[(int)$month - 1];
			$newYear = '20' . $year;
			return $newMonth . "/" . $day . "/" . $newYear;

		} else {
			return $date;
		}
	}

	usort($files, "sortFunction");

	$allSermons = "";
 foreach($files as $file) {
	if($file !== "." && $file !== ".."){
		$href = './audio/' . $file;
		$date = substr($file, 0, 8);
		readableDate($date);

		$fileData = $getID3->analyze($href);
		$title = $fileData['tags']['id3v2']['title'][0];
		$reference = $fileData['tags']['id3v2']['subtitle'][0];

		$currentSermon = (
		'<div class="sermon">
		<span class="sermon-date">' . readableDate($date) . '</span>
		<a class="sermon-title" target="_blank" href="' . $href . '"><span>' . $title . '</span></a>
		<span class="sermon-reference">' . $reference . '</span>

		<audio controls="controls" class="audio-player">
		<source src="' . $href . '" type="audio/mpeg" />
		Your browser does not support the audio element.
		</audio>
		</div>')
		;
	}

	$allSermons = $allSermons . $currentSermon;
}
// write to cache file
$sermonList = fopen('../sermons/sermonList.php', "w");
fwrite($sermonList, time() . $allSermons);
fclose($sermonList);
// return the sermons
echo $allSermons;

?>
