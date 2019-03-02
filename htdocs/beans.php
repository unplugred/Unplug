<?php
$color = "#000000";
$title = "beans";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				display: flex;
			}
			
			#mainimage{
				margin: auto auto;
				font-size: 32pt;
				text-align: center;
			}
		</style>
	</head>
	<body>
		<div id="mainimage">
			<img src="/assets/beans.webp"></img>
			<br/>
			spilled bean counter: <b>3</b>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>