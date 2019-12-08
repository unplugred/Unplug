<?php
$title = "180422";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#bg {
				position: absolute;
				top: 0;
				left: 0;
				height: 100vh;
				background-image: url("<?php echo assets ?>/180422.png");
				background-size: cover;
				background-position: center center;
				opacity: 0.8;
			}

			body {
				font-size: 22vw;
				text-align: center;
				font-weight: bold;
			}

			#text {
				position: absolute;
				height: 100vh;
				margin-top: calc(50vh - 17vw);
				width: 100vw;
				color: #fffcf3;
			}

			#scanlines {
				position: absolute;
				width: 100vw;
				height: 100vh;
				top: 0;
				left: 0;
				background-image: url("<?php echo assets ?>/scanlines.png");
				opacity: 0.4;
			}

			@media screen and (orientation:landscape) {
				body{
					font-size: 22vh;
				}

				#text {
					margin-top: 33vh;
				}
			}
		</style>
	</head>
	<body>
		<div id="bg"></div>
		<p id="text">180422</p>
		<div id="scanlines"></div>
		<script>
			var starting = new Date(2019, 7, 18, 7, 30, 0, 0);
			var ending = new Date(2022, 3, 18, 15, 0, 0, 0);
			var bg = document.getElementById("bg");

			setInterval(update, 5000);
			function update()
			{
				bg.style.width = ((((Date.now() - starting.getTime())/(ending.getTime() - starting.getTime()) + 18) % 1) * 100) + "vw";
			}
			update();
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>