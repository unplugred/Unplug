<?php
$title = "countdown";
$icon = "/countdown/favicon.ico";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				font-size: 33vw;
				text-align: center;
				font-weight: bold;
				background-color: #110000;
			}

			*{
				cursor: url("/assets/cursors/wait.png") 6 0, wait;
			}

			#final-form{
				width: 100px;
				height: 100px;
				display: none;
				margin: calc(50vh - 50px) calc(50vw - 50px);
				background-image: url("countdown.gif");
			}

			#timer {
				height: 100vh;
				margin-top: calc(50vh - 10vw);
			}

			@media screen and (orientation:landscape) {
				body{
					font-size: 20vh;
				}

				#timer {
					height: 100vh;
					margin-top: 40vh;
				}
			}
		</style>
	</head>
	<body>
		<p id="timer">08:00:00</p>
		<a href="countdown/" id="final-form"></a>
		<script>
			var timer = document.getElementById("timer");
			var interval = setInterval(myTimer, 500);
			var hours = 8;
			var minutes = 0;
			var seconds = 0;

			function myTimer() {
				if(--seconds < 0){
					if(--minutes < 0){
						if(--hours < 0){
							timer.style.display = "none";
							document.getElementById("final-form").style.display = "block";
							clearInterval(interval);
						}
						else{
							minutes = 59;
							seconds = 119;
						}
					}
					else{
						seconds = 119;
					}
				}
				if(seconds % 2 == 0) timer.innerHTML = `${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 20 ? `0${(seconds * .5)}` : (seconds * .5)}`;

				document.body.style.backgroundColor = seconds % 2 == 0 ? "#110000" : "#000000";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>