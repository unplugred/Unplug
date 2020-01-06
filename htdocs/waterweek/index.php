<?php
$title = "Water Week";
$description = "a shooter drawing game";
$color = "#FFCCFF";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/waterweek/favicon.ico";
$ogimage = "/waterweek/cover.png";
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
				background: none !important;
			}

			#loading {
				background-image: url("<?php echo assets ?>/waterweek/loading.png");
				animation-name: loadd;
				animation-duration: 1s;
				animation-direction: alternate;
				width: 218px;
				height: 42px;
				animation-iteration-count: infinite;
				animation-timing-function: ease-in-out;
				display: none;
				margin: calc(50vh - 21px) calc(50vw - 106px);
				position: absolute;
			}

			@keyframes loadd {
				0% { opacity: 0; }
				13% { opacity: 0; }
				100% { opacity: 1; }
			}

			body {
				width: 100%;
				height: 100%;
				margin: 0;
				overflow: hidden;
				background-color: black;
			}

			html {
				width: 100%;
				height: 100%;
				margin: 0;
			}

			#play {
				background-image: url("<?php echo assets ?>/waterweek/start.png") !important;
				width: 118px;
				height: 42px;
			}
		</style>
	</head>
	<body>
		<div id="loading"></div>
		<div id="gameContainer"><a id="play" class="play" href="javascript:void(0)" onclick="play()"></a></div>
		<script src="<?php echo assets ?>/UnityLoader.js"></script>
		<script>
			function UnityProgress(unityInstance, progress){}
			function play()
			{
				document.getElementById("loading").style.display = "block";
				document.getElementById("play").style.display = "none";
				var unityInstance = UnityLoader.instantiate("gameContainer", "Build/waterweek.json", {onProgress: UnityProgress});
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>