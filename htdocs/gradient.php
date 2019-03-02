<?php
$color = "#36393E";
$title = "gradient";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-color:#36393E;
			}

			.mainimage {
				margin-top: calc(50vh - 24px);
				margin-left: calc(50vw - 500px);
				display: block;
				max-width:542px;
			}

			.mainimagelink {
				width: 1000px;
				height: 48px;
				background-image: url("/assets/gradient.png");
				display: block;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<a class="mainimagelink" href="/symbolism"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>