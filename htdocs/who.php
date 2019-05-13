<?php
$color = "#000000";
$title = "who";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.mainimage {
				margin: calc(50vh - 31px) auto;
				width:48px;
			}

			.who {
				width: 35px;
				height: 15px;
				background-image: url("/assets/who/who.png");
				display: block;
				margin: 10px auto;
			}

			.phone {
				width: 48px;
				height: 14px;
				background-image: url("/assets/who/phone.png");
				display: block;
				margin: 10px auto;
			}

			.question {
				width: 6px;
				height: 13px;
				background-image: url("/assets/who/question.png");
				display: block;
				margin: 10px auto;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			<a class="who" href="/myself-today" title="who"></a>
			<a class="phone" href="/lines" title="phone"></a>
			<a class="question" href="/answer" title="?"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>