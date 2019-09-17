<?php
$color = "#aa0000";
$title = "books";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			.mainimage {
				margin-top: calc(40vh - 100px);
				margin-left: calc(50vw - 250px);
				display: block;
				width: 450px;
				height: 200px;
				background-image: url("<?php echo $assets ?>/books.png");
				border: 4px #aa0000 solid;
			}

			.mainimagelink {
				display: block;
				width: 349px;
				height: 27px;
				margin-top: 166px;
				position: absolute;
				margin-left: 94px;
			}
		</style>
	</head>
	<body>
		<div class="mainimage" title="i once read a book about how to be happy.">
			<a class="mainimagelink" href="/joke"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>