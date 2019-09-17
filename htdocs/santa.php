<?php
$color = "#FF7700";
$title = "santa";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
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
				background-image: url("<?php echo $assets ?>/santa.png");
			}
		</style>
	</head>
	<body>
		<div class="mainimage" href="/snow" title="mr. santa himself"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>