<?php
$color = "#000000";
$title = "weeeee";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			html{
				overflow-y: scroll;
			}

			body{
				height: 1000vh;
			}

			#title{
				position: absolute;
				width: 359px;
				height: 19px;
				margin: calc(50vh) calc(50vw - 180px);
				background-image: url("/assets/weeeee/title.png");
				background-size: cover;
				background-position: top right;
			}

			.block{
				position: absolute;
				transform: translateX(-50%) translateY(-50%);
				background-attachment: fixed;
				box-shadow: 5px 5px 0px 0px rgba(0,0,0,1);
				image-rendering: -webkit-optimize-contrast;
				image-rendering: optimizeSpeed;
				image-rendering: pixelated;
			}

			#appendme{
				position: relative;
			}
		</style>
	</head>
	<body>
		<div id="appendme"></div>
		<div id="title" title="Scroll really fast up and down for max fun"></div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script>
			function makeEven(val){
				return Math.floor(val * .5) * 2;
			}

			var h = $('body').height() * .5;
			var scrollTop = (document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop) + (window.innerHeight*.5);

			function Blox(){
				this.div = document.createElement("div");
				var w = Math.random() * .9 + .05;
				var s = Math.random() * 600 + 40;
				this.div.style.width = makeEven(Math.min(1 - w, w) * s) + "px";
				this.div.style.height = makeEven(Math.max(1 - w, w) * s) + "px";
				this.position = [ Math.random() * 100, Math.random() * 1000 ];
				this.speed = Math.random() - .1;
				this.div.style.left = this.position[0] + "vw";
				this.div.style.top = "calc(" + this.position[1] + "vh + " + ((scrollTop - h) * this.speed) + "px)";
				var tex = Math.floor(Math.random() * 7);
				if(tex < 2) tex += Math.random() > .5 ? "a" : "b";
				this.div.style.backgroundImage = "url(\"/assets/weeeee/" + tex + ".png\")";
				this.div.style.backgroundPosition = Math.floor(Math.random() * 1024) + "px " + Math.floor(Math.random() * 1024) + "px";
				this.div.className = "block";
			}

			var bloxes = [];
			for (x = 0; x < 150; x += 1)
				document.getElementById("appendme").appendChild((bloxes[x] = new Blox()).div);

			window.onscroll = function() {
				h = $('body').height() * .5;
				scrollTop = (document.documentElement ? document.documentElement.scrollTop : document.body.scrollTop) + (window.innerHeight*.5);
				for(x = 0; x < bloxes.length; x++)
				{
					bloxes[x].div.style.top = "calc(" + bloxes[x].position[1] + "vh + " + ((scrollTop - h) * bloxes[x].speed) + "px)";
				}
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>