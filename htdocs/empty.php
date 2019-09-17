<?php
$title = "empty";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				margin: calc(10vh) auto;
				width:80vw;
				display: block;
				max-width: 100vh;
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
			empty class
			<a href="/bars"><img class="mainimagelink" src="<?php echo $assets ?>/empty.jpg"/></a>
			also,
			<br/>
			im sitting in an <a href="/useless-flower/">empty class</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>