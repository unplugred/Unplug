<?php
$color = "#36393E";
$title = "space";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-color:#36393E;
			}

			.mainimage {
				margin-top: calc(50vh - 49px);
				margin-left: calc(50vw - 271px);
				display: block;
				max-width:542px;
			}

			.mainimagelink {
				width: 542px;
				height: 98px;
				background-image: url("/assets/space.png");
				display: block;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<a class="mainimagelink" title="hello i am from outer space
ive come to bring you cake." href="/knowledge"></a>
			<br/>
			messages from outer space
			<br/>
			satellites. <a href="/stock-market-man">what do they want from me?</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>