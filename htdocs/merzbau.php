<?php
$title = "merzbau";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php';
?>
		<style>
			body {
				background-color: white;
				font-family: sans-serif;
				background-color: white;
			}

			#all {
				padding: 139px 460px 90px 40px;
				max-width: 420px;
				margin: auto;
				background-image:  url("<?php echo assets ?>/merzbau/header.png"),  url("<?php echo assets ?>/merzbau/stockimage.png"), url("<?php echo assets ?>/merzbau/line.png");
				background-repeat: no-repeat, no-repeat, repeat-x;
				background-position: top center, bottom right, bottom right;
			}

			#title{
				font-size: 36px;
				min-height: 50px;
				color: #228feb;
				margin-bottom: 0;
				font-weight: bold;
				background: -webkit-linear-gradient(#228feb, #14316f);
				-o-background-color: transparent;
				-webkit-background-clip: text;
				-webkit-text-fill-color: transparent;
			}

			ul {
				list-style-image: url("<?php echo assets ?>/merzbau/tick.png");
				font-size: 18px;
			}

			.button {
				background: #339D22;
				background: -moz-linear-gradient(top, #b8ddb3 0%, #359f28 100%);
				background: -ms-linear-gradient(top, #b8ddb3 0%, #359f28 100%);
				background: -o-linear-gradient(top, #b8ddb3 0%, #359f28 100%);
				background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #b8ddb3), color-stop(100%, #359f28));
				background: -webkit-linear-gradient(top, #b8ddb3 0%, #359f28 100%);
				background: linear-gradient(to bottom, #b8ddb3 0%, #359f28 100%);
				border-radius: 3px;
				border: 1px solid #359f28;
				color: #ffffff;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#b8ddb3', endColorstr='#359f28', GradientType=0);
				font-weight: bold;
				margin: 50px auto 15px auto;
				padding: 6px 0;
				width: 112px;
				font-size: 13px;
				display: block;
				text-align: center;
				text-decoration: none;
			}
		</style>
	</head>
	<body>
		<div id="all">
			<div id="title">This entire website is:</div>
			<ul>
				<li>Unintuitive</li>
				<li>Aesthetically unpleasing</li>
				<li>Edgy af</li>
			</ul>
			<a class="button" href="seconds" title="and why do some people seem to like it">Why did i make it</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>