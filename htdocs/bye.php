<?php
$title = "bye";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#fade{
				position: absolute;
				width: 100vw;
				height: 0;
				top: 0;
				background-color: transparent;
				animation-name: fade;
				animation-duration: 0.7s;
				animation-timing-function: cubic-bezier(1,0,1,0);
			}

			@keyframes fade {
				0% { background-color: black; height: 100vh; }
				25% { background-color: #000000bd; }
				50% { background-color: #0000007f; }
				75% { background-color: #0000003f; }
				100% { background-color: transparent; }
			}

			#canva {
				position: absolute;
				top: 0;
				left: 0;
			}
		</style>
	</head>
	<body>
		<img id="bg" title="bye" src="<?php echo $assets ?>/bye/fakery.png" style="display: none;"></div>
		<img id="bye" title="bye" src="<?php echo $assets ?>/bye/bye.png" style="display: none;"></div>
		<canvas id="canva"></canvas>
		<div id="fade" style="display: none;"></div>
		<script>
			var canvas = document.getElementById("canva");
			var ctx = canvas.getContext("2d");
			var bg = document.getElementById("bg");
			var bye = document.getElementById("bye");

			window.onload = function(){
				document.getElementById("fade").style.display = null;
				redraw();
			};
			window.onresize = function(){ redraw(); };

			function redraw()
			{
				canvas.width = window.innerWidth;
				canvas.height = window.innerHeight;
				var hw = Math.round(canvas.width*.5);
				var hh = Math.round(canvas.height*.5);
				ctx.drawImage(bg, hw - 153, hh - 163);
				for (x = -125; x < Math.min(hw, hh + 3); x += 40)
					ctx.drawImage(bye, x + hw, x + hh + 3);
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
