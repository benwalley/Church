<?php require_once __DIR__ . '/../liveStream/dataMethods.php';?>

	<link rel="stylesheet" type="text/css" href="/includes/css/header.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">


	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Montserrat:300,400,600|Nunito:300,400,700|Oxygen:300,700" rel="stylesheet"> -->

	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oxygen:300,400,700" rel="stylesheet">

<!-- jQuery -->
	<script
	  src="https://code.jquery.com/jquery-3.3.1.min.js"
	  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	  crossorigin="anonymous">
	</script>

	<!-- favicons -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>


<body>
	<div class = "header">
		<div class="blur"></div>
			<div class = "navbar">
				<div class = "logo">
					<a href = "/" >
						<span class = "logoLarge">Gospel</span>
						<span class = "logoSmall">of</span>
						<span class = "logoLarge">Grace</span>
						<span class = "logoLarge logoLast">Church</span>
					</a>
				</div>

				<div class = "navLinks">
					<a class = "navLink" href="/"><span class = "activeLink navLinkSpan">Home</span></a>
					<a class = "navLink" href="/about"><span class = "navLinkSpan">About Us</span></a>
					<a class = "navLink" href="/sermons"><span class = "navLinkSpan">Sermons</span></a>
					<a class = "navLink" href="/learn"><span class = "navLinkSpan">learning</span></a>
					<a class = "navLink" href="/contact"><span class = "navLinkSpan">Contact</span></a>

                </div>
                <?php if(isBannerEnabled()): ?>
                    <?php echo htmlspecialchars_decode (getData(BANNER_CONTENTS_FILE)); ?>
                <?php endif; ?>

					<div class = "hamburger">
						<div class = "bar top"></div>
						<div class = "bar middle"></div>
						<div class = "bar bottom"></div>
					</div>
			</div>
		</div>
</body>

