<?php
$color = "#FF7700";
$title = "santa";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-color: #FF7700;
			}

			.mainimage {
				margin-top: calc(50vh - 168px);
				margin-left: calc(50vw - 170px);
				display: block;
				width: 341px;
				height: 336px;
				background-image: url("/assets/santa.png");
			}
		</style>
	</head>
	<body>
		<div class="mainimage" href="/snow"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>