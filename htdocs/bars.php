<?php
$title = "bars";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				margin: calc(10vh) auto;
				width:80vw;
				max-width: 100vh;
				display: block;
				font-size: 3em;
				text-align: center;
				font-weight: bold;
			}

			.mainimagelink {
				width: inherit;
				display: block;
				width:80vw;
				max-width: 100vh;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<a href="<?php echo $assets ?>/im-alone-in-class-again.mp3"><img class="mainimagelink" src="<?php echo $assets ?>/bars.jpg" title="an oddly bent tree"/></a>
			<br/>
			bars
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
