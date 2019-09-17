<?php
$title = "glow";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				width: 100vw;
				height: 100vh;
			}

			.mainimagelink {
				margin-top: calc(50vh - 200px);
				margin-left: calc(50vw - 200px);
				width: 434px;
				height: 367px;
				background-image: url("<?php echo $assets ?>/glow.png");
				position: absolute;
			}

			.textish {
				float: right;
				margin-top: calc(100vh - 1.6em + 7px);
				margin-right: 7px;
				font-size: 1.6em;
			}
		</style>
	</head>
	<body>
		<div class="mainimagelink"></div>
		<a class="textish" href="/countdown/">can you see me in the dark</a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
