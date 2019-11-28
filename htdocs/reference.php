<?php
$color = "#000CFF";
$title = "reference";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				background-color:#000CFF;
			}

			.mainimage {
				margin-top: calc(40vh - 34px);
				margin-left: calc(50vw - 61px);
				display: block;
				width: 122px;
				height: 68px;
				background-image: url("<?php echo $assets ?>/reference.gif");
			}
		</style>
	</head>
	<body>
		<a href="/merzbau" class="mainimage" title="hexagon sun called"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>