<?php
$title = "discord";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>

		<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed" rel="stylesheet">

		<style>
			#bg {
				background-image: url("<?php echo $assets ?>/discord.png");
				width: calc(100vw + 520px);
				height: calc(100vh + 520px);
				position: absolute;
				opacity: 0.1;
				animation: background 16s 0s linear infinite;
			}

			.wrap {
				display: inline-block;
				line-height: 0;
				position: absolute;
			}

			#verticle{
				animation: vert 3s 0s ease-in-out infinite;
			}
			#horizontal{
				animation: horz 6s -0.75s ease-in-out infinite;
			}
			#rotation{
				animation: rot 6s -1.5s ease-in-out infinite;
				font-size: 10vw;
				font-weight: bold;
				font-family: 'Saira Extra Condensed', sans-serif;
			}

			@keyframes vert {
				0% {
					margin-top: calc(50vh + 5vw);
				}
				50% {
					margin-top: calc(50vh - 5vw);
				}
				100% {
					margin-top: calc(50vh + 5vw);
				}
			}
			@keyframes horz {
				0% {
					margin-left: 65vw;
				}
				50% {
					margin-left: 35vw;
				}
				100% {
					margin-left: 65vw;
				}
			}
			@keyframes rot {
				0% {
					transform: translate(-50%, 0) rotate(0.02turn);
				}
				50% {
					transform: translate(-50%, 0) rotate(-0.02turn);
				}
				100% {
					transform: translate(-50%, 0) rotate(0.02turn);
				}
			}
			@keyframes background {
				0% {
					margin: 0;
				}
				100% {
					margin: -520px;
				}
			}
		</style>
	</head>

	<body>
		<div id="bg"></div>
		<div id="verticle" class="wrap">
			<div id="horizontal" class="wrap">
				<div id="rotation" class="wrap">
					red#3510
				</div>
			</div>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
