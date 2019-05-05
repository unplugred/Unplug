<?php
$color = "#000000";
$title = "lines";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-color: white;
			}

			#lines{
				display: block;
				width: 100vw;
				height: 100vh;
				background-image: url("/assets/lines.png");
				background-size: cover;
				background-position: top right;
			}
		</style>
	</head>
	<body>
		<a href="/traffic" id="lines"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>