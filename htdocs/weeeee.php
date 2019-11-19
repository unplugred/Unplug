<?php
$title = "weeeee";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<style>
			html{
				overflow-y: scroll;
			}

			body{
				height: 1000vh;
				image-rendering: -webkit-optimize-contrast;
				image-rendering: optimizeSpeed;
				image-rendering: pixelated;
			}

			#canva {
				position: fixed;
				top: 0;
				left: 0;
			}
		</style>
	</head>
	<body>
		<img style="display: none" id="w" src="<?php echo $assets ?>/weeeee/w.png">
		<img style="display: none" id="e" src="<?php echo $assets ?>/weeeee/e.png">
		<img style="display: none" id="m" src="<?php echo $assets ?>/weeeee/m.png">
		<img style="display: none" id="title" src="<?php echo $assets ?>/weeeee/title.png">
		<img style="display: none" id="0a" src="<?php echo $assets ?>/weeeee/0a.png?v=2">
		<img style="display: none" id="0b" src="<?php echo $assets ?>/weeeee/0b.png?v=2">
		<img style="display: none" id="1a" src="<?php echo $assets ?>/weeeee/1a.png?v=2">
		<img style="display: none" id="1b" src="<?php echo $assets ?>/weeeee/1b.png?v=2">
		<img style="display: none" id="2" src="<?php echo $assets ?>/weeeee/2.png?v=2">
		<img style="display: none" id="3" src="<?php echo $assets ?>/weeeee/3.png?v=2">
		<img style="display: none" id="4" src="<?php echo $assets ?>/weeeee/4.png?v=2">
		<img style="display: none" id="5" src="<?php echo $assets ?>/weeeee/5.png?v=2">
		<img style="display: none" id="6" src="<?php echo $assets ?>/weeeee/6.png?v=2">
		<img style="display: none" id="7a" src="<?php echo $assets ?>/weeeee/7a.png?v=2">
		<img style="display: none" id="7b" src="<?php echo $assets ?>/weeeee/7b.png?v=2">
		<img style="display: none" id="7c" src="<?php echo $assets ?>/weeeee/7c.png?v=2">
		<img style="display: none" id="7d" src="<?php echo $assets ?>/weeeee/7d.png?v=2">
		<canvas id="canva"></canvas>
		<script>
			var canvas = document.getElementById("canva");
			var ctx = canvas.getContext("2d");
			var letters = [
				document.getElementById("w"),
				document.getElementById("e"),
				document.getElementById("m")];
			var title = document.getElementById("title");
			var patterns = [
				document.getElementById("0a"),
				document.getElementById("0b"),
				document.getElementById("1a"),
				document.getElementById("1b"),
				document.getElementById("2"),
				document.getElementById("3"),
				document.getElementById("4"),
				document.getElementById("5"),
				document.getElementById("6"),
				document.getElementById("7a"),
				document.getElementById("7b"),
				document.getElementById("7c"),
				document.getElementById("7d")];

			var scrollspeed = .15;
			var weespeed = .5;
			var weetop, weeanchor;
			var weestage = 6;
			var weeheight = 999999;
			var weeend = Math.random() * 500 + 500;
			var scrollTop = document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop;
			var prevscroll = 0;

			window.onload = function(){
				redraw();
			};
			window.onresize = function(){ redraw(); };

			function redraw()
			{
				canvas.width = window.innerWidth;
				canvas.height = window.innerHeight;
				draw();
			}

			function makeEven(val)
			{
				return Math.floor(val * .5) * 2;
			}

			function Blox()
			{
				var w = Math.random() * .9 + .05;
				var s = Math.random() * 600 + 40;
				this.width = makeEven(Math.min(1 - w, w) * s);
				this.height = makeEven(Math.max(1 - w, w) * s);

				this.position = [ Math.random(), Math.random() * 10, Math.floor(Math.random() * 1024), Math.floor(Math.random() * 1024) ];

				this.speed = Math.random() - .1;

				var tex = Math.floor(Math.random() * 8);
				this.bg = tex;
				switch(tex)
				{
					case 0:
						this.bg = (Math.random() > 0.5) ? 1 : 0;
						break;
					case 1:
						this.bg = (Math.random() > 0.5) ? 3 : 2;
						break;
					case 7:
						this.bg = Math.floor(Math.random() * 4) + 9;
						break;
					default:
						this.bg += 2;
						break;
				}
			}

			var bloxes = [];
			for (x = 0; x < 200; x += 1) bloxes[x] = new Blox();

			function update() {
				var scrolldif = scrollTop;
				scrollTop = (document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop)*scrollspeed + scrollTop*(1 - scrollspeed);
				prevscroll += scrollTop - scrolldif;

				if(Math.floor(scrollTop) !== Math.floor(scrolldif))
				{
					draw();

					prevscroll = 0;
				}
			}

			setInterval(update, 33);

			function drawbox(x,y,w,h,bg,bgx,bgy)
			{
				ctx.fillRect(x + 5,y + 5,w,h);
				if(y > canvas.height || y < -h) return;
				var ax = 0;
				var ay = 0;
				var bx = 0;
				var by = 0;
				var cx = 0;
				var cy = 0;
				for(px = bgx; px < w; px += patterns[bg].width)
				{
					for(py = bgy; py < h; py += patterns[bg].height)
					{
						ax = -Math.min(px,0);
						ay = -Math.min(py,0);
						bx = Math.min(patterns[bg].width , w - px - ax);
						by = Math.min(patterns[bg].height, h - py - ay);
						ctx.drawImage(patterns[bg], ax, ay, bx, by, x+Math.max(px,0), y+Math.max(py,0), bx, by);
					}
				}
			}

			function draw()
			{
				ctx.clearRect(0, 0, canvas.width, canvas.height);

				var boxpos;
				for(x = 0; x < bloxes.length; x++)
				{
					boxpos = (bloxes[x].position[1] * window.innerHeight + (scrollTop - window.innerHeight*5) * bloxes[x].speed - scrollTop);
					drawbox(
						bloxes[x].position[0] * canvas.width - (bloxes[x].width*.5),
						boxpos - (bloxes[x].height*.5),
						bloxes[x].width,
						bloxes[x].height,
						bloxes[x].bg,
						-(bloxes[x].position[2] % patterns[bloxes[x].bg].width),
						-((bloxes[x].position[3] + boxpos*(bloxes[x].bg !== 5 ? .5 : 1) + 2048) % patterns[bloxes[x].bg].width));
				}

				ctx.drawImage(title, window.innerWidth*.5 - 180, window.innerHeight*.5 - scrollTop);
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>