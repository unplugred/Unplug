<?php
$color = "#000000";
$title = "nqiregvfrzrag";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
			#img
			{
				background-image: url("/assets/nqiregvfrzrag/nqiregvfrzrag.png");
				width: 292px;
				height: 282px;
				position: fixed;
				margin: calc(50vh - 141px) calc(50vw - 146px);
			}

			.numerica {
				background-image: url(/assets/nqiregvfrzrag/bg.png);
				z-index: -1;
				width: 200px;
				height: 16px;
				position: fixed;
				background-attachment: fixed;
				background-position: left top;
				top: 0;
			}
		</style>
	</head>
	<body>
		<div id="img"></div>
		<div class="numerica"></div><div class="numerica"></div><div class="numerica"></div><div class="numerica"></div><div class="numerica"></div><div class="numerica"></div><div class="numerica"></div><div class="numerica"></div><div class="numerica"></div>
		<script>
			var numerica = document.getElementsByClassName("numerica");
			var s = [ 0 ];

			for (var i = 0; i < numerica.length; i++)
			{
				var w = (Math.floor(Math.random() * 20 + 5) * 10);
				numerica[i].style.width = w + "px";
				s[i] = Math.floor((Math.random() * (document.documentElement.clientWidth + w) - w) * .1) * 10;
				numerica[i].style.left = s[i] + "px";
				numerica[i].style.top = (Math.floor(Math.random() * document.documentElement.clientHeight * 0.0625) * 16) + "px";
			}

			function update()
			{
				for (var i = 0; i < numerica.length; i++)
				{
					console.log("hi");
					s[i] += 10;
					numerica[i].style.left = s[i] + "px";
					if(s[i] > document.documentElement.clientWidth)
					{
						var w = (Math.floor(Math.random() * 20 + 5) * 10);
						numerica[i].style.width = w + "px";
						s[i] = -w;
						numerica[i].style.left = s[i] + "px";
						numerica[i].style.top = (Math.floor(Math.random() * document.documentElement.clientHeight * 0.0625) * 16) + "px";
					}
				}
			}
			setInterval(update, 100);
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>