<?php
$title = "hugs";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				width: 100vw;
				height: 100vh;
				background-image: url("<?php echo $assets ?>/hugs.png");
				background-position:center;
				background-repeat:no-repeat;
				background-size:contain;
				display:block;
			}
		</style>
	</head>
	<body>
		<a class="mainimage" href="/weight" title="help"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>