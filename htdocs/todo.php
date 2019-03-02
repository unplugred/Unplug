<?php
$color = "#000000";
$title = "todo";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
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
		<img src="/assets/todo.png" class="mainimage">
		<a class="lankkk" href="/photography"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>