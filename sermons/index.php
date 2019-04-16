<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="/newWebsite/sermons/css/sermons.css">
	<?php
		require_once('./getid3/getid3.php');
		$getID3 = new getID3;
	?> 

	

	<!-- get all subdirectories of ./audio to get all year options -->
	
	<!-- TODO: Add search functionality -->
<div class="main">
	<h1>Sermons</h1>
	<div class = "sermonsDiv">
		<input type="text" name="sermon-search" placeholder="Search by date, title or verse" id="sermon-search">
		
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

						usort($files, "sortFunction");
					?>
					<?php foreach($files as $file): ?>
						<?php if($file !== "." && $file !== ".."): ?>
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
							 			<span class="sermon-title">' . $title . '</span>
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
<script type="text/javascript" src="/newWebsite/sermons/js/sermons.js"></script>
<?php include '../includes/footer.php'; ?> 

