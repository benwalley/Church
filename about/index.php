<?php include '../includes/header.php'; ?>

<link rel="stylesheet" type="text/css" href="/newWebsite/about/css/about.css">

<div class = "topImage">About Us</div>

<div class = "aboutLinks">
	<a class = "aboutLink" href="#beliefs">
		<div class = "linkImage"><i class="fas fa-church"></i></div>
		<div class = "linkName">Beliefs</div>
	</a>
	<a class = "aboutLink" href="#vision">
		<div class = "linkImage"><i class="fas fa-eye"></i></div>
		<div class = "linkName">Vision</div>
	</a>
	<a class = "aboutLink" href="#leadership">
		<div class = "linkImage"><i class="fas fa-users"></i></div>
		<div class = "linkName">Leadership</div>
	</a>
	<a class = "aboutLink" href="#worship">
		<div class = "linkImage"><i class="fas fa-hands"></i></div>
		<div class = "linkName">Worship</div>
	</a>
	<a class = "aboutLink" href="#makingFriends">
		<div class = "linkImage"><i class="fas fa-user-friends"></i></div>
		<div class = "linkName">Making Friends</div>
	</a>
	<a class = "aboutLink" href="#forFamilies">
		<div class = "linkImage"><i class="fas fa-child"></i></div>
		<div class = "linkName">For Families</div>
	</a>
</div>

<div class = "jumpSections">
	<a class = "jumpLink" href="#beliefs">Beliefs</a>
	<a class = "jumpLink" href="#vision">Vision</a>
	<a class = "jumpLink" href="#leadership">Leadership</a>
	<a class = "jumpLink" href="#worship">Worship</a>
	<a class = "jumpLink" href="#makingFriends">Making Friends</a>
	<a class = "jumpLink" href="#forFamilies">For Families</a>
</div>

<div class = "mainContent">
	<?php include 'beliefs.html'; ?>
	<?php include 'vision.html'; ?>
	<?php include 'leadership.html'; ?>
	<?php include 'worship.html'; ?>
	<?php include 'friends.html'; ?>
	<?php include 'families.html'; ?>
</div>

<script type="text/javascript" src="/newWebsite/about/js/about.js"></script>

<?php include '../includes/footer.php'; ?>

