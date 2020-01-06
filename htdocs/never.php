<?php
$color = "#32363B";
$title = "never";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				background-color:#32363B;
			}

			.mainimage {
				margin-top: calc(50vh - 260px);
				margin-left: calc(50vw - 49px);
				display: block;
				width: 98px;
				height: 520px;
				background-image: url("<?php echo assets ?>/never.png");
			}
		</style>
	</head>
	<body>
		<a class="mainimage" title="inception" href="/inception"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>