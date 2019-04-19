<!DOCTYPE html>
<html>
<head>
	<meta name="description" content="View a variety of learning resources, ranging from recommended books, to useful links, to information about baptism.">
<link rel="stylesheet" type="text/css" href="/learn/css/learning.css">

<title>Learning Resources</title>

<?php include '../includes/header.php'; ?>

<div class = "topImage">Educational Resources</div>

<div class = "mainDiv">
	<div class = "section recommended" id = "0">
		<div class = linkImage></div>
		<div class = "linkName">Recommended Reading</div>

	</div>

	<div class = "section membership" id = "1">
		<div class = linkImage></div>
		<div class = "linkName">Membership and Baptism</div>
	</div>

	<div class = "section library" id = "2">
		<div class = linkImage></div>
		<div class = "linkName">Our Library</div> 
	</div>

	<div class = "section outsideLinks" id = "3">
		<div class = linkImage></div>
		<div class = "linkName">outside Links</div>
	</div>

</div>

<?php include 'recommendedReading.php'; ?>
<?php include 'membership.html'; ?>
<?php include 'library.html'; ?>
<?php include 'links.html'; ?>

<script type="text/javascript" src="/learn/js/learning.js"></script>
<?php include '../includes/footer.php'; ?>