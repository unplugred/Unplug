<?php
$title = "bus";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.mainimage {
				text-align: center;
				text-anchor: middle;
				margin: calc(50vh - 48px) auto;
				width: 300px;
				padding: 20px;
				background-color: black;
			}

			.vid {
				position: absolute;
				width: 100vw;
				height: 100vh;
				z-index: -10000;
				object-fit: cover;
			}

			body {
				background-image: url("/assets/bus/thumbnail.png");
				background-size: cover;
				background-position: center center;
			}
		</style>
	</head>
	<body>
		<video class="vid" autoplay muted>
			<source src="/assets/bus/crystals.mp4" type="video/mp4">
		</video>
		<div class="mainimage">
			i am a bus now
			<br/>
			<a href="/empty">
				where will i go?
			</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>