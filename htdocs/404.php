<?php
$title = "404";
$description = "you got lost.";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				width: 702px;
				height: 236px;
				background-size: contain;
				background-image: url("<?php echo assets ?>/404.gif");
				background-repeat: no-repeat;
				background-position: center;
				margin-top: 15px;
			}

			.bodytext{
				margin: 20px;
			}

			b{
				color:white;
			}

			.mainthing{
				border: 5px #999 solid;
				width: 702px;
				margin-top: calc(35vh - 192px);
				margin-left: calc(50vw - 351px);
				position: absolute;
			}

			.santa{
				width: 100px;
				height: 100px;
				background-image: url("<?php echo assets ?>/objects/0.gif");
				position: absolute;
				margin-top: calc(105vh - 170px);
				margin-left: calc(100vw - 120px);
			}
		</style>
	</head>
	<body>
		<div class="mainthing">
			<div class="mainimage"></div>

			<div class="bodytext">
				<b>you got lost.</b>
				<br/>
				<br/>
				<a href="/">click here</a> to get back.
			</div>
		</div>
		<a href="/santa" class="santa" title="santa"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>