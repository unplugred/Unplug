<?php
$color = "#000000";
$title = "idk";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.mainimage {
				margin: calc(50vh - 42px) calc(50vw - 152px);
				position: absolute;
				width: 300px;
				height: 80px;
				text-align: center;
				line-height: 80px;
				font-weight: bold;
				border: 4px solid black;
				color: black;
				background-color: #666;
				background-image: url("assets/tastefulnoise.png");
				background-repeat: repeat;
				background-attachment: fixed;
			}

			#canva {
				width: 100vw;
				height: 100vh;
				position: absolute;
			}
		</style>
	</head>
	<body>
		<canvas id="canva"></canvas>
		<div class="mainimage">
			i dont even know.
		</div>
		<script type="text/javascript">
			var canvas = document.getElementById("canva");
			var ctx = canvas.getContext("2d");
			canvas.width  = window.innerWidth;
			canvas.height = window.innerHeight;

			var size = 10, spacing = 5, speed = 5,
			x, y, directionX, directionY;
			resetPosition();
			hit();

			setInterval(timer, speed * spacing);
			function timer()
			{
				if(canvas.width != window.innerWidth || canvas.height != window.innerHeight)
				{
					canvas.width  = window.innerWidth;
					canvas.height = window.innerHeight;
					if(x > canvas.width || y > canvas.height)
						resetPosition();
				}

				ctx.fillStyle = getRandomColor();
				ctx.fillRect(x,y,size,size);

				let attempt = 0;
				while (x + directionX + size > canvas.width || x + directionX < 0 || y + directionY + size > canvas.height || y + directionY < 0)
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

			var letters = '0123456789ABCDEF';
			function getRandomColor()
			{
				let color = (Math.floor(Math.random() * 150 + 50)).toString(16);
				return '#' + color + color + color;
			}


			// Reset position if box is out of the window
			function resetPosition()
			{
				x = Math.floor(Math.random() * (canvas.width - size));
				y = Math.floor(Math.random() * (canvas.height - size));
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
