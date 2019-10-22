<?php
$title = "fuck";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				margin-top: calc(50vh - 232px);
				margin-left: calc(50vw - 200px);
				display: block;
				width: 400px;
				height: 487px;
				background-image: url("<?php echo $assets ?>/fuck.gif");
			}

			#linktonextpage {
				top: 196px;
				left: 196px;
				width: 116px;
				height: 74px;
				display: block;
				position: relative;
			}
		</style>
	</head>
	<body>
		<div class="mainimage"><a title="ppl" id="linktonextpage" href="/ppl"></a></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>