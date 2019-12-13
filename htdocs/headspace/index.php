<?php
$title = "Headspace";
$description = "";
$color = "#5C8199";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/headspace/favicon.ico";
$ogimage = "/headspace/cover.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			canvas {
				position: absolute;
			}

			#gameContainer {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-position: center center !important;
				background-repeat: no-repeat !important;
				background-color: black;
			}

			.loading {
				background-image: url("bg.png") !important;
			}

			body {
				width: 100%;
				height: 100%;
				margin: 0;
				overflow: hidden;
			}

			html {
				width: 100%;
				height: 100%;
				margin: 0;
			}

			#play {
				width: 0;
				height: 0;
				border-style: solid;
				border-width: 35px 0 35px 60.6px;
				border-color: transparent transparent transparent white;
				transition: .5s;
				transform-origin: 20px 35px;
			}
		</style>
	</head>
	<body>
		<div id="gameContainer"><a id="play" href="javascript:void(0)" onclick="play()"></a></div>
		<script src="<?php echo assets ?>/UnityLoader.js"></script>
		<script>
			var button = document.getElementById("play");
			var direction = false;
			var angle = 0;
			var interval;

			function updateplay()
			{
				angle += direction ? 5 : -5;
				button.style.transform = "rotate(" + angle + "deg)";
			}

			button.onmouseover = function() {
				direction = !direction;
				interval = setInterval(updateplay, 20);
			};
			button.onmouseout = function() {
				angle = Math.round(angle/120)*120 + (direction ? -240 : 240);
				button.style.transform = "rotate(" + angle + "deg)";
				clearInterval(interval);
			};

			function UnityProgress(unityInstance, progress){}
			function play()
			{
				button.style.display = "none";
				clearInterval(interval);
				document.getElementById("gameContainer").className = "loading";
				var unityInstance = UnityLoader.instantiate("gameContainer", "Build/headspace.json", {onProgress: UnityProgress});
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>