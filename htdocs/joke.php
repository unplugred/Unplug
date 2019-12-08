<?php
$title = "joke";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#bg {
				background-image: url("<?php echo assets ?>/static.gif");
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
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
