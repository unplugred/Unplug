<?php
$title = "countdown";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#final-form{
				width: 102px;
				height: 164px;
				margin: calc(50vh - 82px) calc(50vw - 51px);
				background-image: url("<?php echo assets ?>/countdown/seizure-flower.gif");
			}
		</style>
	</head>
	<body>
		<div href="countdown" id="final-form" title="seizure flower"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
