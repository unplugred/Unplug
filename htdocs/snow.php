<?php
$title = "snow";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#snow{
				background-image: url("<?php echo assets ?>/snow.png");
				background-size: contain;
				background-repeat: no-repeat;
				display: block;
				margin: calc(50vh - 144px) calc(50vw - 353px);
				width: 706px;
				height: 289px;
			}
		</style>
	</head>
	<body>
		<a id="snow" href="/sick" title="sick"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>