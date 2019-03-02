<?php
$color = "#000000";
$title = "countdown";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				font-size: 33vw;
				text-align: center;
				font-weight: bold;
			}
			
			#final-form{
				width: 50px;
				height: 50px;
				display: none;
				margin: calc(50vh - 25px) calc(50vw - 25px);
				background-image: url("countdown.gif");
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
		<a href="countdown" id="final-form"></a>
		<script type="text/javascript">
			var timer = document.getElementById("timer");			
			var interval = setInterval(myTimer, 1000);
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
						seconds = 59;
					}
				}
				timer.innerHTML = `${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>