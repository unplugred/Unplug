<?php
$title = "...";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				display: flex;
			}

			audio {
				margin: auto auto;
			}
		</style>
	</head>
	<body>
		<audio controls>
			<source src="<?php echo assets ?>/im-alone-in-class-again.mp3" type="audio/mpeg">
		</audio>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
