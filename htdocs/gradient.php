<?php
$color = "#36393E";
$title = "gradient";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				background-image: url("<?php echo assets ?>/gradient/bg.png"), -webkit-linear-gradient(left, #36393E 49%, black 50%);
				background-image: url("<?php echo assets ?>/gradient/bg.png"), -o-linear-gradient(left, #36393E 49%, black 50%);
				background-image: url("<?php echo assets ?>/gradient/bg.png"), linear-gradient(to right, #36393E 49%, black 50%);
				background-position: center center;
				background-repeat: repeat-y;
			}

			.mainimage {
				margin: auto auto;
				max-width: 100%;
			}

			.mainimagelink {
				width: 100%;
				height: 100%;
				display: flex;
			}

			@media (max-width: 1000px) {
				body {
					background-size: contain;
				}
			}
		</style>
	</head>
	<body>
			<a class="mainimagelink" href="/symbolism" title="oops">
				<img class="mainimage" src="<?php echo assets ?>/gradient/gradient.png">
			</a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>