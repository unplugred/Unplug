<?php
$color = "#000000";
$title = "bye";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.mainimage {
				width: 306px;
				height: 325px;
				background-size: contain;
				background-image: url("/assets/bye/fakery.png");
				background-repeat: no-repeat;
				background-position: center;
				margin-top: calc(50vh - 162px);
				margin-left: calc(50vw - 153px);
			}

			.bleh{
				width: 82px;
				height: 36px;
				position: absolute;
				background-image: url("/assets/bye/bye.png");
			}

			.close{
				display: block;
				width: 100vw;
				height: 100vh;
				z-index:1000;
				position: absolute;
			}
		</style>
	</head>
	<body>
		<div class="mainimage" id="appendme"></div>
		<script type="text/javascript">
			for (x = 0; x < Math.min(window.innerWidth/2 + 125, window.innerHeight/2 + 121); x += 40) { 
				var div = document.createElement("div");
				div.style.margin = (42 + x) + "px 0 0 " + (28 + x) + "px";
				div.className = "bleh";
				document.getElementById("appendme").appendChild(div);
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
