<?php
$title = "spot";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#mainimage {
				width: 216px;
				height: 216px;
				background-color: black;
				top: calc(50% - 108px);
				position: absolute;
				left: calc(50% - 108px);
			}

			.vid {
				position: absolute;
				width: 100%;
				height: 100%;
			}
		</style>
	</head>
	<body>
		<video class="vid" autoplay muted loop>
			<source src="<?php echo assets ?>/spot.webm" type="video/webm">
		</video>
		<canvas id="mainimage" width="216" height="216" title="**....//*."></canvas>
		<script>
			var canvas = document.getElementById("mainimage");
			var ctx = canvas.getContext("2d");
			var imageData;
			var dots = [];
			for (n = 0; n < 30; n++)
				dots[n] = getcords();


			setInterval(timer,66);
			function timer()
			{
				dots[Math.floor(Math.random()*dots.length)] = getcords();

				ctx.clearRect(0, 0, 216, 216);
				ctx.strokeStyle = "#FFFFFF";
				ctx.lineWidth = 2;
				ctx.beginPath();

				for (n = 0; n < dots.length; n++)
				{
					ctx.moveTo(dots[n][0] - 5, dots[n][1]);
					ctx.lineTo(dots[n][0] + 5, dots[n][1]);
					ctx.moveTo(dots[n][0], dots[n][1] - 5);
					ctx.lineTo(dots[n][0], dots[n][1] + 5);
				}

				ctx.stroke();

				imageData = ctx.getImageData(0, 0, 216, 216);
				for(i = 0; i !== imageData.data.length; i++)
					imageData.data[i] = (imageData.data[i] >> 7) * 0xFF;
				ctx.putImageData(imageData, 0, 0);
			}

			function getcords()
			{
				return [
					Math.floor(Math.random()*190 + 13),
					Math.floor(Math.random()*190 + 13)];
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>