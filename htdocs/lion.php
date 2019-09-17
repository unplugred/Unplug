<?php
$title = "lion";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			a{
				display: block;
				width: 300px;
				height: 300px;
				margin: calc(50vh - 150px) calc(50vw - 150px);
				background-image: url("<?php echo $assets ?>/lion.png");
				background-size: cover;
				background-position: top right;
			}
		</style>
	</head>
	<body>
		<a href="/180422" title="lion"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>