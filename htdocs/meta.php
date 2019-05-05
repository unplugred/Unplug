<?php
$color = "#000000";
$title = "meta";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			#mainimage {
				position: absolute;
				width: 300px;
				height: 80px;
				text-align: center;
				line-height: 80px;
				font-weight: bold;
				color: black;
				margin-left: -150px;
				margin-top: -40px;
				animation: anim 10s linear infinite;
				text-decoration: none;
			}

			body{
				background-image: url("/assets/meta.png");
				animation: nanim 5s linear infinite;
			}

			@keyframes nanim{
				0%{
					background-position: 0px 0;
				}
				100%{
					background-position: 100px 0;
				}
			}

			@keyframes anim{
				0%{
					background-color: #FF0000;
					transform: rotate(0deg);
				}
				17%{
					background-color: #FFFF00;
				}
				33%{
					background-color: #00FF00;
				}
				50%{
					background-color: #00FFFF;
				}
				67%{
					background-color: #0000FF;
				}
				83%{
					background-color: #FF00FF;
				}
				100%{
					background-color: #FF0000;
					transform: rotate(360deg);
				}
			}
		</style>
	</head>
	<body>
		<a href="/paper" id="mainimage">
			lol, thats so meta
		</a>
		<script type="text/javascript">
			var sizex = 0, sizey = 0, spacing = 5, speed = 5,
			x, y, directionX, directionY;
			var thng = document.getElementById("mainimage");
			resetPosition();
			hit();

			setInterval(timer, speed * spacing);
			function timer()
			{
				thng.style.top = y + "px";
				thng.style.left = x + "px";

				let attempt = 0;
				while (x + directionX + sizex > window.innerWidth || x + directionX - sizex < 0 || y + directionY + sizey > window.innerHeight || y + directionY - sizey < 0)
				{
					hit();
					if(++attempt > 100){
						resetPosition();
						break;
					}
				}

				x += directionX;
				y += directionY;
			}

			function hit()
			{
				let dir = Math.random() * Math.PI * 2;
				directionX = Math.sin(dir) * spacing;
				directionY = Math.cos(dir) * spacing;
			}

			function resetPosition()
			{
				x = Math.floor(Math.random() * (window.innerWidth - sizex));
				y = Math.floor(Math.random() * (window.innerHeight - sizey));
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
