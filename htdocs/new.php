<?php
$color = "#FFFFFF";
$title = "new";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php';
?>
		<style>
			body {
				background-color: white;
			}

			#link{
				background-image: url("<?php echo assets ?>/new.png");
				position: absolute;
				top: 2vw;
				left: 2vw;
				width: 296px;
				height: 223px;
			}
		</style>
	</head>
	<body>
		<a href="/rediger" title="rediger" id="link"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>