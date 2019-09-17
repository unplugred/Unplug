<?php
$color = "#36393E";
$title = "myself, today";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				background-color:#36393E;
				font-size: 1em;
				text-align: center;
			}

			.mainimage {
				margin: calc(50vh - 31px) auto;
			}

			.mainimagelink {
				margin: 0 auto;
				width: 61px;
				height: 18px;
				background-image: url("<?php echo $assets ?>/myself-today.png");
				margin-bottom: 20px;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<div class="mainimagelink"></div>
			<a href="/old-edgy-art">myself</a>, <a href="/space">today</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
