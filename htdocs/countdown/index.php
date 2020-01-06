<?php
$title = "countdown";
$icontype = "x-icon";
$icon = "/countdown/favicon.ico";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				font-size: 33vw;
				text-align: center;
				font-weight: bold;
				background-color: #110000;
			}

			*{
				cursor: url("<?php echo assets ?>/cursors/wait.png") 6 0, wait;
			}

			#final-form{
				width: 50px;
				height: 50px;
				display: none;
				margin: calc(50vh - 25px) calc(50vw - 25px);
				background-image: url("<?php echo assets ?>/countdown/0.gif");
			}

			#timer {
				height: 100vh;
				margin-top: calc(50vh - 17vw);
			}

			@media screen and (orientation:landscape) {
				body{
					font-size: 33vh;
				}

				#timer {
					height: 100vh;
					margin-top: 33vh;
				}
			}
		</style>
	</head>
	<body>
		<p id="timer">08:00</p>
		<a href="countdown/" id="final-form"></a>
		<script>
			var timer = document.getElementById("timer");
			var interval = setInterval(myTimer, 500);
			var minutes = 8;
			var seconds = 0;

			function myTimer() {
				if(--seconds < 0){
					if(--minutes < 0){
						timer.style.display = "none";
						document.getElementById("final-form").style.display = "block";
						clearInterval(interval);
					}
					else{
						seconds = 119;
					}
				}
				if(seconds % 2 === 0) timer.innerHTML = `${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 20 ? `0${(seconds * .5)}` : (seconds * .5)}`;

				document.body.style.backgroundColor = seconds % 2 === 0 ? "#110000" : "#000000";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
