<?php
$title = "smudge";
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
			<source src="<?php echo $assets ?>/smudge.webm" type="video/webm">
		</video>
		<canvas id="mainimage" width="216" height="216" title="**....//*."></canvas>
		<script>
			var canvas = document.getElementById("mainimage");
			var ctx = canvas.getContext("2d");
			var dots = [];
			for (n = 0; n < 20; n++)
				dots[n] = [
					Math.floor(Math.random()*200 + 8),
					Math.floor(Math.random()*200 + 8),
					Math.floor(Math.random()*200 + 8),
					Math.floor(Math.random()*200 + 8),
					Math.random(),
					Math.random()*.01 + .01];


			setInterval(timer,33);
			function timer()
			{
				ctx.clearRect(0, 0, 216, 216);
				ctx.strokeStyle = "#FFFFFF";
				ctx.lineWidth = 2;
				ctx.beginPath();

				var dot;
				for (n = 0; n < dots.length; n++)
				{
					ctx.moveTo(108,108)
					dot = getcords(n);
					ctx.lineTo(dot[0], dot[1]);
				}

				ctx.stroke();

				var imageData = ctx.getImageData(0, 0, 216, 216);
				for(i = 0; i !== imageData.data.length; i++)
					imageData.data[i] = (imageData.data[i] >> 7) * 0xFF;
				ctx.putImageData(imageData, 0, 0);
			}

			function getcords(n)
			{
				dots[n][4] += dots[n][5];
				if(dots[n][4] > 1)
				{
					dots[n] = [
						dots[n][2],
						dots[n][3],
						Math.floor(Math.random()*200 + 8),
						Math.floor(Math.random()*200 + 8),
						0,
						Math.random()*.01 + .01];
				}
				return [
					dots[n][0]*(1 - dots[n][4]) + dots[n][2]*dots[n][4],
					dots[n][1]*(1 - dots[n][4]) + dots[n][3]*dots[n][4]];
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>