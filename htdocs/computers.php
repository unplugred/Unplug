<?php
$color = "#3B6EA5";
$title = "computers";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				display: flex;
				flex-wrap: wrap;
				justify-content: space-between;
				align-content: space-between;
				width: 112px;
				height: 78px;
				margin-left: calc(50vw - 56px);
				margin-top: calc(50vh - 39px);
				background-color: #3B6EA5;
			}

			.icon {
				width: 34px;
				height: 34px;
				display: block;
			}

			.computer {
				background-image: url("<?php echo $assets ?>/computers/off.png");
			}

			.on:hover {
				background-image: url("<?php echo $assets ?>/computers/on.png");
			}

			.file:hover {
				background-image: url("<?php echo $assets ?>/trash/file.png");
			}
		</style>
		<link rel="prefetch" href="<?php echo $assets ?>/computers/on.png" />
		<link rel="prefetch" href="<?php echo $assets ?>/trash/file.png" />
	</head>
	<body>
		<a href="/trash" title="trash" class="icon computer on"></a>
		<a href="/mail" title="mail" class="icon computer on"></a>
		<a href="/bits" title="bits" class="icon computer on"></a>
		<a href="/disconnected" title="DISCONNECTED" class="icon computer"></a>
		<a href="/discord" title="discord" class="icon computer on"></a>
		<a href="/crisis" title="." class="icon file"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>