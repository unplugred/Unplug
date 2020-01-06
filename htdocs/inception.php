<?php
$color = "#3B6EA5";
$title = "this is dumb";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				background:
url("<?php echo assets ?>/inception/taskbaright.png") bottom right no-repeat,
url("<?php echo assets ?>/inception/taskbarmiddle.png") bottom left repeat-x, #3B6EA5;
			}

			#browser {
				padding: 2px;
				display: block;
				width: calc(60vw + 30vmin);
				height: calc(50vh + 30vmin);
				top: calc(20vh - 15vmin);
				left: calc(25vw - 20vmin);
				background:
url("<?php echo assets ?>/window/wintoprightbar.png") top right no-repeat,
url("<?php echo assets ?>/inception/header.png") top left no-repeat,
url("<?php echo assets ?>/window/wintopbar.png") top left repeat-x,
url("<?php echo assets ?>/window/winbottomright.png") bottom right no-repeat,
url("<?php echo assets ?>/window/winbottomleft.png") bottom left no-repeat,
url("<?php echo assets ?>/window/winbottom.png") bottom left repeat-x,
url("<?php echo assets ?>/window/winleft.png") top left repeat-y,
url("<?php echo assets ?>/window/winright.png") top right repeat-y, #C0C0C0;
				background-size: initial;
				padding: 24px 5px 5px 5px;
				position: fixed;
			}

			input {
				height: calc(100% - 4px)!important;
				top: -5.5px;
				position: relative;
				direction: ltr!important;
			}

			.input {
				display: inline-block;
				padding: 0;
				height: 20px;
				width: calc(100% - 96px);
			}

			.insetborder1 {
				border-width: 1px;
				border-style: solid;
				border-color: #808080 white white #808080;
			}

			.insetborder2 {
				border-width: 1px 0 0 1px;
				border-style: solid;
				border-color: black;
				width: calc(100% - 2px);
				height: calc(100% - 1px);
			}

			#back .icon{
				background-image: url("<?php echo assets ?>/inception/back.png");
			}

			.off#back .icon {
				background-image: url("<?php echo assets ?>/inception/backoff.png");
			}

			#front .icon {
				background-image: url("<?php echo assets ?>/inception/front.png");
			}

			.off#front .icon {
				background-image: url("<?php echo assets ?>/inception/frontoff.png");
			}

			.off {
				pointer-events: none;
			}

			.icon {
				width: calc(100% - 1px);
				height: calc(100% - 1px);
				background-position: center center;
				background-repeat: no-repeat;
				border-width: 0 1px 1px 0;
				border-style: solid;
				border-color: #808080;
			}

			.icon:active {
				border-width: 1px 0 0 1px;
			}

			#go .icon {
				background-image: url("<?php echo assets ?>/inception/go.png");
			}

			#go {
				width: 42px;
				margin-right: 0;
				margin-left: 2px;
			}

			button {
				width: 22px;
				height: 22px;
				padding: 0;
				margin-right: 2px;
				background: #C0C0C0;
				border-width: 1px;
				border-style: solid;
				border-color: white black black white;
			}

			button:active {
				border-color: black white white black;
			}

			#topbar {
				height: 22px;
				margin-bottom: 2px;
			}

			.innerbrowser {
				width: calc(100% - 4px);
				height: calc(100% - 28px);
			}

			.close {
				width: 16px;
				height: 14px;
				position: absolute;
				background-image: url("<?php echo assets ?>/window/close.png");
				top: 5px;
				right: 5px;
			}

			.close:active {
				background-image: url("<?php echo assets ?>/window/closed.png");
			}

			#rainbow {
				background-image: url("<?php echo assets ?>/inception/glitch.png");
				position: absolute;
				z-index: 1;
				height: 15px;
				left: 95px;
				top: 27px;
				max-width: calc(100% - 148px);
				pointer-events: none;
			}

			.dicon {
				display: block;
				width: 34px;
				height: 34px;
				margin: 24px 0 0 24px;
			}

			#trash {
				background-image: url("<?php echo assets ?>/trash/trashfull.png");
			}

			#computer {
				background-image: url("<?php echo assets ?>/computers/off.png");
			}

			#start {
				background-image: url("<?php echo assets ?>/inception/startoff.png");
				position: absolute;
				bottom: 1px;
				left: 1px;
				width: 57px;
				height: 24px;
			}

			.on#start {
				background-image: url("<?php echo assets ?>/inception/starton.png");
				pointer-events: none;
			}

			canvas {
				width: 100vw;
				height: 100vh;
				position: absolute;
				top: 0;
				left: 0;
				pointer-events: none;
			}
		</style>
		<link rel="prefetch" href="<?php echo assets ?>/window/closed.png" />
	</head>
	<body>
		<a class="dicon" href="/trash" id="trash" title="trash"></a>
		<a class="dicon" href="/computers" id="computer" title="computer"></a>
		<a href="javascript:void(0)" id="start" onclick="psychadelic()"></a>
		<div id="browser">
			<div id="rainbow"></div>
			<div id="topbar"><button id="back" onclick="backk()" class="off"><div class="icon"></div></button><button id="front" onclick="frontt()" class="off"><div class="icon"></div></button><div class="insetborder1 input"><input class="insetborder2" id="input" spellcheck="false"></input></div><button id="go" onclick="changeurl()"><div class="icon"></div></button></div>
			<div class="insetborder1 innerbrowser"><iframe class="insetborder2" id="iframe" src="/unplug" onLoad="updateurl(this.contentWindow.location);"></iframe></div>
			<a class="close" href="javascript:void(0)" onclick="closee()"></a>
		</div>
		<canvas id="canva" style="display: none"></canvas>
		<script>
			var iframe = document.getElementById("iframe");
			var input = document.getElementById("input");
			var back = document.getElementById("back");
			var front = document.getElementById("front");
			var rainbow = document.getElementById("rainbow");
			var hostt = "https://         /";

			var historyy = [];
			var unhistory = [];
			var current = validate(iframe.src);
			input.value = hostt + current;
			prevvalue = current;
			rainbow.style.width = Math.ceil(Math.max(Math.min(input.value.length, hostt.length - 1) - 8, 0)*6.6) + "px";
			rainbow.style.backgroundPositionX = (Math.random()*100) + "%";

			function changeurl()
			{
				v = validate(input.value.substr(hostt.length));
				if(v != current)
				{
					historyy.push(current);
					current = v;
					unhistory = [];
					back.className = null;
					front.className = "off";
				}
				iframe.src = tourll(current);
			}

			function updateurl(urll)
			{
				urll = validate(urll);
				if(urll != current)
				{
					historyy.push(current);
					current = urll;
					unhistory = [];
					back.className = null;
					front.className = "off";
				}
				input.value = hostt + current;
			}

			function validate(v)
			{
				var r = singlevalid(v);
				while(r != v)
				{
					v = r;
					r = singlevalid(r);
				}
				return r;
			}

			function singlevalid(v)
			{
				v = String(v).replace(/\s/g,'');
				if(v.startsWith("http"))
				{
					var search = v.substr(8).search("/");
					if(search !== -1) v = v.substr(search + 9);
					else v = " ";
				}
				while(v.startsWith("/")) v = v.substr(1);
				if(v.startsWith("unplug")) v = "";
				if(v.startsWith("?")) v = "";
				if(v.startsWith("inception?")) v = "inception";
				return v;
			}

			function tourll(v)
			{
				if(v == "") return "/unplug";
				if(v.startsWith("inception")) return "/inception?" + Math.floor(Math.random()*10000);
				return "/" + v;
			}

			function backk()
			{
				unhistory.push(current);
				current = historyy.pop();
				input.value = hostt + current;
				iframe.src = tourll(current);
				if(historyy.length === 0)
					back.className = "off";
				front.className = null;
			}

			function frontt()
			{
				historyy.push(current);
				current = unhistory.pop();
				input.value = hostt + current;
				iframe.src = tourll(current);
				if(unhistory.length === 0)
					front.className = "off";
				back.className = null;
			}

			function closee()
			{
				document.getElementById("browser").style.display = "none";
			}
			input.addEventListener('keydown', function(event)
			{
				if(event.which == 13) changeurl();
				else setTimeout(function() {
					if(input.value == prevvalue) return;
					if(input.value.length <= hostt.length)
					{
						input.value = hostt.substr(0, input.value.length);
						prevvalue = input.value;
						rainbow.style.width = Math.ceil(Math.max(Math.min(input.value.length, hostt.length - 1) - 8, 0)*6.6) + "px";
					}
					else if(input.value.startsWith(hostt))
						prevvalue = input.value;
					else
						input.value = prevvalue;
					rainbow.style.backgroundPositionX = (Math.random()*100) + "%";
				});
			});


			var canvas = document.getElementById("canva");
			var ctx = canvas.getContext("2d");
			canvas.width  = window.innerWidth;
			canvas.height = window.innerHeight;

			function line()
			{
				this.switchup = Math.random()*40 + 20;
				this.color = getRandomColor();
				let dir = Math.random()*Math.PI*2;
				dir = Math.floor(Math.random()*4);
				if(dir % 2 == 0)
				{
					this.dirx = (dir - 1)*size;
					this.diry = 0;
					this.x = canvas.width*(2 - dir)*.5 - this.dirx;
					this.y = Math.floor(Math.random()*canvas.height);
				}
				else
				{
					this.dirx = 0;
					this.diry = (dir - 2)*size;
					this.x = Math.floor(Math.random()*canvas.width);
					this.y = canvas.height*(3 - dir)*.5 - this.diry;
				}
			}

			var size = 10;
			var lines = [];
			for (var i = 10 - 1; i >= 0; i--) {
				lines.push(new line());
			}

			function timer()
			{
				if(canvas.width !== window.innerWidth || canvas.height !== window.innerHeight)
				{
					canvas.width  = window.innerWidth;
					canvas.height = window.innerHeight;
					for (var i = lines.length - 1; i >= 0; i--)
						if(lines[i].x > canvas.width || lines[i].y > canvas.height)
							lines[i] = new line();
				}

				for (var i = lines.length - 1; i >= 0; i--) {
					ctx.fillStyle = lines[i].color;
					ctx.fillRect(lines[i].x,lines[i].y,size,size);

					let attempt = 0;
					while (lines[i].x + lines[i].dirx > canvas.width || lines[i].x + lines[i].dirx + size < 0 || lines[i].y + lines[i].diry > canvas.height || lines[i].y + lines[i].diry + size < 0)
					{
						lines[i] = new line();
						if(++attempt > 100) break;
					}

					lines[i].x += lines[i].dirx;
					lines[i].y += lines[i].diry;
					lines[i].switchup -= 5;
					if(lines[i].switchup <= 0)
					{
						let mult = 1;
						if(Math.random() >= .5) mult *= -1;
						let h = lines[i].dirx;
						lines[i].dirx = lines[i].diry*mult;
						lines[i].diry = h*mult;
						lines[i].switchup = Math.random()*40 + 20;
					}
				}
			}

			function getRandomColor()
			{
				let str = "#";
				let color = (Math.floor((Math.random() * 255))).toString(16);
				for (var i = 2; i >= 0; i--)
				{
					if(color.length == 1) color = "0" + color;
					str += color;
					color = (Math.floor((Math.random() * 255))).toString(16);
				}
				return str;
			}

			function psychadelic()
			{
				document.getElementById("start").className = "on";
				canvas.style.display = null;
				setInterval(timer, 50);
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>