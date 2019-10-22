<?php
$title = "knowledge";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				margin-top: calc(50vh - 148px);
				margin-left: calc(50vw - 360px);
				display: block;
				width: 720px;
				height: 296px;
				background-image: url("<?php echo $assets ?>/knowledge.png");
			}
		</style>
	</head>
	<body>
		<a class="mainimage" href="/never" title="never"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
