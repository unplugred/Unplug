<?php
$title = "blob";
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
			<source src="<?php echo $assets ?>/blob.webm" type="video/webm">
		</video>
		<canvas id="mainimage" width="216" height="216"></canvas>
		<script>
			var canvas = document.getElementById("mainimage");
			var ctx = canvas.getContext("2d");
			var qr = [
				0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,
				0,1,1,1,1,1,1,1,0,1,0,0,1,1,1,1,0,0,0,1,1,1,1,1,1,1,0,
				0,1,0,0,0,0,0,1,0,0,1,1,0,0,1,0,0,1,0,1,0,0,0,0,0,1,0,
				0,1,0,1,1,1,0,1,0,0,0,1,0,1,1,0,1,0,0,1,0,1,1,1,0,1,0,
				0,1,0,1,1,1,0,1,0,0,0,0,0,1,1,1,0,1,0,1,0,1,1,1,0,1,0,
				0,1,0,1,1,1,0,1,0,0,1,0,1,0,1,1,0,1,0,1,0,1,1,1,0,1,0,
				0,1,0,0,0,0,0,1,0,0,0,1,0,1,1,1,0,1,0,1,0,0,0,0,0,1,0,
				0,1,1,1,1,1,1,1,0,1,0,1,0,1,0,1,0,1,0,1,1,1,1,1,1,1,0,
				0,0,0,0,0,0,0,0,0,1,0,1,1,0,1,0,1,0,0,0,0,0,0,0,0,0,0,
				0,1,1,0,1,1,0,1,0,0,1,1,1,1,0,1,1,0,0,1,0,0,0,0,0,1,0,
				0,1,1,1,0,0,1,0,1,0,1,0,0,1,0,1,1,0,0,0,1,1,1,1,1,0,0,
				0,1,0,1,0,0,1,1,0,0,0,1,1,0,1,1,1,0,0,0,1,1,1,0,0,1,0,
				0,0,1,0,0,0,1,0,1,1,1,1,1,0,0,1,1,0,1,0,1,0,1,1,1,1,0,
				0,0,1,1,1,0,0,1,1,0,1,0,1,1,0,0,0,1,0,1,0,0,0,0,0,1,0,
				0,1,1,0,1,1,0,0,0,1,0,0,1,0,0,1,1,0,1,0,0,1,0,0,1,0,0,
				0,1,1,1,1,0,1,1,0,1,0,1,0,1,0,1,1,0,0,1,0,1,1,1,1,1,0,
				0,1,0,1,1,0,0,0,1,0,0,1,0,0,0,0,1,0,0,1,1,0,1,1,0,1,0,
				0,1,0,1,0,1,1,1,1,1,1,0,1,0,1,0,1,1,1,1,1,1,0,1,1,0,0,
				0,0,0,0,0,0,0,0,0,1,1,0,0,0,1,0,0,1,0,0,0,1,0,1,1,0,0,
				0,1,1,1,1,1,1,1,0,0,0,1,1,0,0,0,0,1,0,1,0,1,0,0,0,1,0,
				0,1,0,0,0,0,0,1,0,0,1,1,0,0,1,1,1,1,0,0,0,1,0,0,1,0,0,
				0,1,0,1,1,1,0,1,0,1,0,1,0,1,0,1,1,1,1,1,1,1,0,0,0,0,0,
				0,1,0,1,1,1,0,1,0,1,0,0,1,0,0,1,1,1,1,1,0,0,0,0,1,1,0,
				0,1,0,1,1,1,0,1,0,0,0,0,1,1,1,1,0,0,1,0,0,1,1,1,1,1,0,
				0,1,0,0,0,0,0,1,0,1,1,0,0,1,0,1,1,0,0,0,1,1,0,1,1,1,0,
				0,1,1,1,1,1,1,1,0,1,1,1,1,0,0,0,0,1,1,1,0,0,1,0,0,1,0];
			var shapes = [[
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0],[

				0,1,1,0,0,1,1,0,
				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1,
				0,1,1,1,1,1,1,0,
				0,0,1,1,1,1,0,0,
				0,0,0,1,1,0,0,0],[

				0,0,0,1,1,0,0,0,
				0,0,1,1,1,1,0,0,
				0,1,1,1,1,1,1,0,
				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1,
				0,1,1,1,1,1,1,0,
				0,0,1,1,1,1,0,0,
				0,0,0,1,1,0,0,0],[

				0,0,0,1,1,0,0,0,
				0,0,0,1,1,0,0,0,
				0,0,1,1,1,1,0,0,
				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1,
				0,0,1,1,1,1,0,0,
				0,0,0,1,1,0,0,0,
				0,0,0,1,1,0,0,0],[

				1,1,0,0,0,0,1,1,
				1,1,1,0,0,1,1,1,
				0,1,1,1,1,1,1,0,
				0,0,1,1,1,1,0,0,
				0,0,1,1,1,1,0,0,
				0,1,1,1,1,1,1,0,
				1,1,1,0,0,1,1,1,
				1,1,0,0,0,0,1,1],[

				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1,
				1,1,0,0,0,0,1,1,
				1,1,0,0,0,0,1,1,
				1,1,0,0,0,0,1,1,
				1,1,0,0,0,0,1,1,
				1,1,1,1,1,1,1,1,
				1,1,1,1,1,1,1,1],[

				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0,
				0,0,1,1,1,1,0,0,
				0,0,1,1,1,1,0,0,
				0,0,1,1,1,1,0,0,
				0,0,1,1,1,1,0,0,
				0,0,0,0,0,0,0,0,
				0,0,0,0,0,0,0,0]];

			var shapesdata = [
				ctx.createImageData(8,8),
				ctx.createImageData(8,8),
				ctx.createImageData(8,8),
				ctx.createImageData(8,8),
				ctx.createImageData(8,8),
				ctx.createImageData(8,8),
				ctx.createImageData(8,8)];
			for(var s = 0; s < shapesdata.length; s++)
				for(var x = 0; x < shapes[s].length*4; x++)
				{
					shapesdata[s].data[x] = shapes[s][Math.floor(x*.25)]*255;
				}
			shapes = 0;

			setInterval(timer,1);
			function timer()
			{
				var pos = 0;
				while(qr[pos] == 0)
					pos = Math.floor(Math.random()*qr.length);
				pos *= 8;
				ctx.putImageData(shapesdata[Math.max(0,Math.floor((Math.random()*2-1)*shapesdata.length))],pos%216,Math.floor(pos/216)*8);
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
