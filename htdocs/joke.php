<?php
$color = "#000000";
$title = "joke";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			#bg {
				background-image: url("/assets/static.gif");
				width: 100vw;
				height: 100vh;
				position: absolute;
				opacity: 0.5;
			}

			.mainimage {
				text-align: center;
				text-anchor: middle;
				margin: calc(50vh - 14px) 0;
				position: absolute;
				width: 100vw;
			}
		</style>
	</head>

	<body>
		<div id="bg"></div>
		<div class="mainimage">
			i dont get the joke
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
