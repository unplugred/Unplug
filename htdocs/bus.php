<?php
$color = "#000000";
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
			}
		</style>
	</head>
	<body>
		<iframe src="https://www.youtube-nocookie.com/embed/8jS2nvwqzpA?autoplay=1&loop=1&modestbranding=1&showinfo=0&rel=0&iv_load_policy=3&controls=0&disablekb=1" class="vid" frameborder="0"></iframe>
		<div class="mainimage">
			i am a bus now
			<br/>
			<a href="/empty">
				where will i go?
			</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>