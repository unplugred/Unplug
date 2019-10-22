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
				background-image: url("<?php echo $assets ?>/new.png");
				position: absolute;
				top: 2vw;
				left: 2vw;
				width: 296px;
				height: 223px;
			}
		</style>
	</head>
	<body>
		<div id="link"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>