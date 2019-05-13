<?php
$color = "#000000";
$title = "hugs";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.mainimage {
				width: 100vw;
				height: 100vh;
				background-image: url("/assets/hugs.png");
				background-position:center;
				background-repeat:no-repeat;
				background-size:contain;
				display:block;
			}
		</style>
	</head>
	<body>
		<a class="mainimage" href="/weight" title="help"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>