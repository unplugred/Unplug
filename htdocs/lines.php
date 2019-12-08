<?php
$color = "#ffffff";
$title = "lines";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				background-color: white;
			}

			#lines{
				display: block;
				width: 100vw;
				height: 100vh;
				background-image: url("<?php echo assets ?>/lines.png");
				background-size: cover;
				background-position: top right;
			}
		</style>
	</head>
	<body>
		<a href="/traffic" id="lines" title="traffic"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>