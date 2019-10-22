<?php
$color = "#36393E";
$title = "space";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				background-color:#36393E;
			}

			.mainimage {
				margin-top: calc(50vh - 49px);
				margin-left: calc(50vw - 271px);
				display: block;
				max-width:542px;
			}

			.mainimagelink {
				width: 542px;
				height: 98px;
				background-image: url("<?php echo $assets ?>/space.png");
				display: block;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<a class="mainimagelink" title="knowledge" href="/knowledge"></a>
			<br/>
			messages from outer space
			<br/>
			satellites. <a title="stock market man" href="/stock-market-man">what do they want from me?</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>