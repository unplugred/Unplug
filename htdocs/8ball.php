<?php
$title = "8ball";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body {
				display: flex;
				justify-content: space-around;
				align-items: center;
			}

			#selection {
				background-image: url("<?php echo assets ?>/8ball/windowtop.png"), url("<?php echo assets ?>/8ball/windowbottom.png"), url("<?php echo assets ?>/8ball/windowmiddle.png");
				background-repeat: no-repeat, no-repeat, repeat-y;
				background-position: top center, bottom center, center center;
				width: 398px;
				max-height: 660px;
				height: 80%;
				padding: 22px 3px 3px 3px;
				margin: 10px 0;
			}

			#ball {
				width: 500px;
				height: 500px;
				max-width: 90vmin;
				max-height: 90vmin;
				background-image: url("<?php echo assets ?>/8ball/base.png");
				background-size: contain;
				background-repeat: no-repeat;
				background-position: center center;
			}

			#balltext {
				width: 53.4%;
				height: 51%;
				top: 12.4%;
				left: 23.4%;
				position: relative;
				background-size: cover;
			}

			#screen1 {
				background-position: center center;
				background-repeat: no-repeat;
			}

			#screen2 {
				overflow-y: auto;
			}

			.screen {
				width: 100%;
				height: 100%;
			}

			#scroll {
				background-image: url("<?php echo assets ?>/8ball/options.png");
				background-position: top left;
				background-repeat: no-repeat;
				width: 100%;
				height: 536px;
				padding-top: 124px;
			}

			.button:hover, .button:focus {
				opacity: 1!important;
			}
			
			.button {
				width: 356px;
				height: 74px;
				background-image: url("<?php echo assets ?>/8ball/optionsselect.png");
				opacity: 0;
				margin: 0 auto 13px auto;
				display: block;
			}

			#screen1 .button {
				top: calc(50% + 36px);
				position: relative;
			}

			@media only all and (max-width: 940px) {
				body {
					flex-direction: column-reverse;
				}

				#ball {
					flex: none;
					max-width: 50vh;
					max-height: 50vh;
					margin-top: 5px;
				}
			}
		</style>
		<link rel="prefetch" href="<?php echo assets ?>/8ball/0.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/1.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/2.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/3.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/4.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/5.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/6.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/7.png" />
		<link rel="prefetch" href="<?php echo assets ?>/8ball/8.png" />
	</head>
	<body>
		<div id="selection">
			<div id="screen1" class="screen" style="background-image: url('<?php echo assets ?>/8ball/start.png')">
				<a href="javascript:void(0)" class="button" id="start" onclick="dechoose()"></a>
			</div>
			<div id="screen2" class="screen" style="display: none">
				<div id="scroll">
					<a href="javascript:void(0)" class="button" id="o1" onclick="choose(1)"></a>
					<a href="javascript:void(0)" class="button" id="o2" onclick="choose(2)"></a>
					<a href="javascript:void(0)" class="button" id="o3" onclick="choose(3)"></a>
					<a href="javascript:void(0)" class="button" id="o4" onclick="choose(4)"></a>
					<a href="javascript:void(0)" class="button" id="o5" onclick="choose(5)"></a>
					<a href="javascript:void(0)" class="button" id="o6" onclick="choose(6)"></a>
				</div>
			</div>
		</div>

		<div id="ball">
			<div id="balltext" style="background-image: url('<?php echo assets ?>/8ball/0.png');"></div>
		</div>

		<script>
			var screen1 = document.getElementById("screen1");
			var screen2 = document.getElementById("screen2");
			var ball = document.getElementById("balltext");
			var screen = 666;
			var interval;

			function choose(option)
			{
				screen2.style.pointerEvents = "none";
				clearInterval(interval);
				if(screen > 4)
					ball.style.backgroundImage = "url('<?php echo assets ?>/8ball/" + Math.floor(Math.random()*5 + 4) + ".png')";
				interval = setInterval(animate, 200);
			}

			function dechoose()
			{
				screen1.style.pointerEvents = "none";
				if(screen == 666) screen = 1;
				else
				{
					clearInterval(interval);
					interval = setInterval(deanimate,200);
				}
				screen1.style.display = "none";
				screen2.style.display = null;
			}

			function animate()
			{
				if(screen == 4)
				{
					ball.style.opacity = "0";
					ball.style.backgroundImage = "url('<?php echo assets ?>/8ball/" + Math.floor(Math.random()*5 + 4) + ".png')";
				}
				else if(screen > 4)
				{
					ball.style.opacity = ((screen - 4)/3);
					if(screen == 7)
					{
						screen1.style.display = null;
						screen2.style.display = "none";
						screen1.style.pointerEvents = null;
						screen2.style.pointerEvents = null;
						screen1.style.backgroundImage = "url('<?php echo assets ?>/8ball/end.png')";
						clearInterval(interval);
						screen = 5;
					}
				}
				else ball.style.backgroundImage = "url('<?php echo assets ?>/8ball/" + screen + ".png')";

				screen++;
			}

			function deanimate()
			{
				if(screen >= 4) ball.style.opacity = ((screen - 4)/3);
				else
				{
					ball.style.backgroundImage = "url('<?php echo assets ?>/8ball/" + Math.abs(screen) + ".png')";
					if(screen == 3) ball.style.opacity = null;
					if(screen == 0)
					{
						clearInterval(interval);
						screen = 2;
					}
				}

				screen--;
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
