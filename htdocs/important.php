<?php
$color = "#000000";
$title = "important";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body {
				background-image: url("/assets/important.png");
				background-repeat: no-repeat;
				background-position: bottom right;
				text-align: center;
			}

			.mainimage {
				margin: calc(50vh - 14px) auto;
				display: table;
			}

			#corner {
				display: block;
				position: absolute;
				width: 250px;
				height: 250px;
				bottom: 0;
				right: 0;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<a href="/assets/important.txt" download="important.txt">important.txt</a>
			<a href="/hyperaction/" id="corner"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
