<?php
$title = "todo";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				height: 100vh;
				margin: 0 calc(50vw - 28vh);
				position: absolute;
			}

			.lankkk{
				display: block;
				position: absolute;
				width: 44vh;
				height: 8.3vh;
				margin: 70vh calc(50vw - 25vh);
			}
		</style>
	</head>
	<body>
		<img src="<?php echo $assets ?>/todo.png" class="mainimage">
		<a class="lankkk" href="/photography" title="photography"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>