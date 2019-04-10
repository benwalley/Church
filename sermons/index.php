<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="/newWebsite/sermons/css/sermons.css">
	<?php
		require_once('./getid3/getid3.php');
		$getID3 = new getID3;
	?> 

	<h1>Sermons</h1>

	<!-- get all subdirectories of ./audio to get all year options -->
	<?php
		$directories = glob('./audio' . '/*' , GLOB_ONLYDIR);
	?>
	<select>
		<option>Year</option>
		<?php foreach($directories as $dir): ?>
			<?php $trimmedDir = substr($dir, -4); ?>
			<!-- Make sure the directory is a year by making sure it starts with 20 -->
			<?php if(substr($trimmedDir, 0, 2) == '20'): ?>
				<?php echo '<option value="' . $trimmedDir . '">' . $trimmedDir . '</option>' ?>
			<?php endif ?>
		<?php endforeach ?>
	</select>
	<!-- TODO: Add search functionality -->
<div class = "sermonsDiv">
	<div class="sermons-header sermon"><span class="sermons-header-date">Date</span><span class="sermons-header-title">Title</span><span class="sermons-header-passage">Passage</span></div>
	<?php $year = date("Y"); ?>
	<?php $files = scandir("./audio/" . $year); ?>
	<?php foreach($files as $file): ?>
		<?php if($file !== "." && $file !== ".."): ?>
			<?php
				$href = './audio/' . $year . '/' . $file;
				$date = substr($file, 0, 8);

				$fileData = $getID3->analyze($href);
				$title = $fileData['tags']['id3v2']['title'][0];
				$reference = $fileData['tags']['id3v2']['subtitle'][0];

			 	echo 
			 		'<a href=' . $href .' class="sermon">
			 			<span class="sermon-date">' . $date . '</span>
			 			<span class="sermon-title">' . $title . '</span>
			 			<span class="sermon-reference">' . $reference . '</span>
			 		</a>' ;
			?>
    	<?php endif ?>
    <?php endforeach ?>
</div>
<script type="text/javascript" src="/newWebsite/sermons/js/sermons.js"></script>
<?php include '../includes/footer.php'; ?> 

