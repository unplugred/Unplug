<?php
$title = "seconds";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>

			#clockcanvas {
				margin: auto auto;
				opacity: .6;
			}

			#text {
				font-weight: bold;
				margin: auto auto;
				text-align: center;
				max-width: 90vw;
			}

			#textcontainer {
				position: absolute;
				display: flex;
				width: 100vw;
				height: 100vh;
			}

			body {
				display: flex;
			}
		</style>
	</head>
	<body>
		<canvas id="clockcanvas"></canvas>
		<div id="textcontainer">
			<div id="text">any second you spend on this site is a second wasted from your life</div>
		</div>
		<script type="text/javascript">
			var canvas = document.getElementById("clockcanvas");
			var ctx = canvas.getContext("2d");
			var halfcanvas;
			var imageData;

			window.onload = function(){
				redraw();
				setInterval(update, 1000);
			};
			window.onresize = function(){ redraw(); };

			function redraw()
			{
				halfcanvas = Math.min(window.innerWidth, window.innerHeight)*.84;
				canvas.width = halfcanvas;
				canvas.height = halfcanvas;
				halfcanvas *= .5;

				update();
			}

			function update()
			{
				ctx.clearRect(0, 0, canvas.width, canvas.height);
				ctx.beginPath();
				ctx.strokeStyle = "#FFFFFF";
				ctx.lineWidth = 3;

				ctx.arc(halfcanvas, halfcanvas, halfcanvas - 2, 0, 2 * Math.PI);

				var time = new Date();
				var angle = time.getMinutes()/30.0*Math.PI;
				ctx.moveTo(Math.sin(angle)*halfcanvas*.762 + halfcanvas, Math.cos(angle)*halfcanvas*-.762 + halfcanvas);
				ctx.lineTo(halfcanvas, halfcanvas);

				angle = time.getHours()/6.0*Math.PI;
				ctx.lineTo(Math.sin(angle)*halfcanvas*.429 + halfcanvas, Math.cos(angle)*halfcanvas*-.429 + halfcanvas);

				ctx.stroke();
				ctx.beginPath();
				ctx.strokeStyle = "#FF0000";
				ctx.lineWidth = 1;

				ctx.moveTo(halfcanvas, halfcanvas);
				angle = time.getSeconds()/30.0*Math.PI;
				ctx.lineTo(Math.sin(angle)*halfcanvas*.857 + halfcanvas, Math.cos(angle)*halfcanvas*-.857 + halfcanvas);
				ctx.stroke();

				imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
				for(i = 0; i !== imageData.data.length; i++)
					imageData.data[i] = (imageData.data[i] >> 7) * 0xFF;
				ctx.putImageData(imageData, 0, 0);
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
