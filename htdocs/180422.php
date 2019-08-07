<?php
$color = "#000000";
$title = "180422";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			#bg {
				position: absolute;
				top: 0;
				left: 0;
				width: <?php $daysthismonth = (float)date("t"); echo fmod((((int)date("Y")) * 12) + ((int)date("n")) + (((float)date("j")) / $daysthismonth) - (18 / $daysthismonth) + 20, 32) / .32; ?>vw;
				height: 100vh;
				background-image: url("/assets/180422.png");
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
				background-image: url("/assets/scanlines.png");
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
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>