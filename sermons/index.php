<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="Listen to or download past sermons from Gospel of Grace Church">
	<link rel="stylesheet" type="text/css" href="/sermons/css/sermons.css">

	<title>Sermons</title>

	<?php include '../includes/header.php'; ?>
	<?php
	require_once('./getid3/getid3.php');
	$getID3 = new getID3;
	?>



	<!-- get all subdirectories of ./audio to get all year options -->

	<!-- TODO: Add search functionality -->
	<div class="main">
		<h1>Sermons</h1>
		<?php
			$cacheFileLocation = '../sermons/sermonList.php';
			$cacheFile = file_get_contents($cacheFileLocation);
			$cacheFileTwo = fopen($cacheFileLocation, "r");
			$cacheDate = fgets($cacheFileTwo, filesize($cacheFileLocation));
			$currentTime = time();
			$cacheTime = substr($cacheFile, 0, 10);
			$timeDiff = $currentTime - $cacheTime;

		?>
		<div class = "sermonsDiv">
			<h3>Search by date, title or verse</h3>
			<input type="text" name="sermon-search" id="sermon-search">
			<div class="sermonsContainer">

				<?php
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

				function isNew($fileYear, $fileMonth) {
                    $current_year = date("y");
                    $current_month = date("m");

                    if($fileYear == $current_year) {
                        return true;
                    } elseif ($fileYear == $current_year - 1 && $fileMonth > $current_month){
                        return true;
                    } else {
                        return false;
                    }
                }

				usort($files, "sortFunction");
				?>
				<?php foreach($files as $file): ?>
					<?php
					$current_year = date("y");
					$current_month = date("m");
					$file_year = substr($file, 6, 2);
					$file_month = substr($file, 0, 2);
					?>
					<!-- Get just the current year first -->
					<?php if($file !== "." && $file !== ".." && isNew($file_year, $file_month)): ?>
						<?php
						$href = './audio/' . $file;
						$date = substr($file, 0, 8);
						readableDate($date);

						$fileData = $getID3->analyze($href);
						$title = $fileData['tags']['id3v2']['title'][0];
						$reference = $fileData['tags']['id3v2']['subtitle'][0];

						echo
						'<div class="sermon">
						<span class="sermon-date">' . readableDate($date) . '</span>
						<a class="sermon-title" target="_blank" href="' . $href . '"><span>' . $title . '</span></a>
						<span class="sermon-reference">' . $reference . '</span>

						<audio controls="controls" class="audio-player">
						<source src="' . $href . '" type="audio/mpeg" />
						Your browser does not support the audio element.
						</audio>
						</div>'
						;
						?>
					<?php endif ?>
				<?php endforeach ?>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="/sermons/js/sermons.js"></script>
	<?php include '../includes/footer.php'; ?>

