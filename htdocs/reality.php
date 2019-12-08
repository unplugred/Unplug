<?php
$title = "reality";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				font-size: 1.6em;
			}

			.mainimage {
				margin-top: calc(50vh - 200px - 1.6em);
				margin-left: calc(50vw - 200px);
				display: block;
				max-width:400px;
			}

			.mainimagelink {
				width: 400px;
				height: 400px;
				background-image: url("<?php echo assets ?>/reality.gif");
				display: block;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<div class="mainimagelink"></div>
			there was a time when i was <a href="/clouds" title="clouds">gone</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>