<?php
$color = "#36393E";
$title = "sophistication";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				background-color:#36393E;
			}

			.mainimage {
				margin-top: calc(50vh - 122px);
				margin-left: calc(50vw - 298px);
				display: block;
				width: 596px;
				height: 243px;
				background-image: url("<?php echo assets ?>/sophistication.png");
				display: block;
			}
		</style>
	</head>
	<body>
		<a class="mainimage" href="/gradient" title="gradient"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>