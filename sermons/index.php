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
			$directories = glob('./audio' . '/*' , GLOB_ONLYDIR);
			$directories = array_reverse($directories);
		?>
		
		<?php foreach($directories as $dir): ?>
				<?php $trimmedDir = substr($dir, -4); ?>
				<!-- Make sure the directory is a year by making sure it starts with 20 -->
				<?php if(substr($trimmedDir, 0, 2) == '20'): ?>
					<?php 
						$files = scandir("./audio/" . $trimmedDir); 
						$files = array_reverse($files) 
					?>
					<?php foreach($files as $file): ?>
						<?php if($file !== "." && $file !== ".."): ?>
							<?php
								$href = './audio/' . $trimmedDir . '/' . $file;
								$date = substr($file, 0, 8);

								$fileData = $getID3->analyze($href);
								$title = $fileData['tags']['id3v2']['title'][0];
								$reference = $fileData['tags']['id3v2']['subtitle'][0];

							 	echo 
							 		'<div class="sermon">
							 			<span class="sermon-date">' . $date . '</span>
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
				<?php endif ?>
			<?php endforeach ?>
	</div>
</div>
<script type="text/javascript" src="/newWebsite/sermons/js/sermons.js"></script>
<?php include '../includes/footer.php'; ?> 

