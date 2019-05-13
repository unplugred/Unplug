<?php
$color = "#000000";
$title = "square";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-image: url("/assets/square.png");
				background-size: contain;
				background-position: bottom left;
				background-repeat: no-repeat;
			}

			#sqr{
				display: block;
				margin: 38% 18%;
				width: 46%;
				height: 46%;
			}

			#wrap{
				width: 100vw;
				height: 100vw;
				max-width: 100vh;
				max-height: 100vh;
				bottom: 0;
				position: absolute;
			}
		</style>
	</head>
	<body>
		<div id="wrap">
			<a id="sqr" href="/todo" title="square"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>