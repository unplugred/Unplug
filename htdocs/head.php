<?php
$title = "head";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.head{
				display: block;
				width: 569px;
				height: 517px;
				margin: calc(50vh - 268px) calc(50vw - 295px);
				background-image: url("<?php echo assets ?>/head.gif");
				background-size: cover;
				background-position: top right;
				border: solid white 10px;
			}
		</style>
	</head>
	<body>
		<a class="head" href="/hands" title="hands"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
