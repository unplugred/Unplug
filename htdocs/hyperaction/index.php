<?php
$title = "Hyperaction";
$description = "a game.";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/hyperaction/favicon.ico";
$ogimage = "/hyperaction/cover.png";
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
				background-size: 64px !important;
				image-rendering: -moz-crisp-edges;
				image-rendering: crisp-edges;
				image-rendering: pixelated;
				background-image: url("<?php echo assets ?>/hyperaction/play.png");
				background-color: white;
			}

			.transition {
				background-image: url("<?php echo assets ?>/hyperaction/transition.gif"), url("<?php echo assets ?>/hyperaction/play.png") !important;
			}

			.loading {
				background-image: url("<?php echo assets ?>/hyperaction/loading.gif"), url("<?php echo assets ?>/hyperaction/transition.gif") !important;
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
				width: 64px;
				height: 64px;
			}
		</style>
		<link rel="prefetch" href="<?php echo assets ?>/hyperaction/transition.gif" />
		<link rel="prefetch" href="<?php echo assets ?>/hyperaction/loading.gif" />
	</head>
	<body>
		<div id="gameContainer" style="background-image: url('<?php echo assets ?>/hyperaction/play.png')"><a id="play" href="javascript:void(0)" onclick="play()"></a></div>
		<script src="<?php echo assets ?>/UnityLoader.js"></script>
		<script>
			function UnityProgress(unityInstance, progress){}
			function play()
			{
				document.getElementById("play").style.display = "none";
				document.getElementById("gameContainer").className = "transition";
				setTimeout(function(){
					document.getElementById("gameContainer").className = "loading";
				}, 300);
				var unityInstance = UnityLoader.instantiate("gameContainer", "Build/hyperaction.json", {onProgress: UnityProgress});
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>