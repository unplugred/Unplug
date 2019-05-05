<?php
$color = "#000000";
$title = "traffic";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-color: white;
			}

			#bg{
				display: block;
				width: 100vw;
				height: 100vh;
				background-image: url("/assets/traffic/off.png");
				background-size: cover;
				background-position: center center;
			}

			#red{
				width: 5.149051490514905vmax;
				height: 4.878048780487805vmax;
				top: calc(50vh - 8vmax);
				left: calc(50vw - 3.6vmax);
				background-image: url("/assets/traffic/red.png");
			}

			#blue{
				width: 5.149051490514905vmax;
				height: 4.878048780487805vmax;
				top: calc(50vh - 4.1vmax);
				left: calc(50vw - 3.6vmax);
				background-image: url("/assets/traffic/yellow.png");
			}

			#green{
				width: 4.878048780487805vmax;
				height: 4.607046070460705vmax;
				top: calc(50vh + .5vmax);
				left: calc(50vw - 3vmax);
				background-image: url("/assets/traffic/green.png");
			}

			.light{
				background-size: contain;
				background-repeat: no-repeat;
				position: absolute;
				opacity: 0;
			}

			.light:hover{
				opacity: 1;
			}
		</style>
	</head>
	<body>
		<div id="bg"></div>
		<a id="red" class="light" href="/cookies"></a>
		<a id="blue" class="light" href="/time"></a>
		<a id="green" class="light" href="/meta"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>