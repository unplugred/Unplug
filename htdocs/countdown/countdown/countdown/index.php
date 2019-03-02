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
				width: 150px;
				height: 150px;
				display: none;
				margin: calc(50vh - 75px) calc(50vw - 75px);
				background-image: url("countdown.gif");
			}
			
			#timer {
				height: 100vh;
				margin-top: calc(50vh - 5vw);
			}
			
			@media screen and (orientation:landscape) {
				body{
					font-size: 11vh;
				}
			
				#timer {
					height: 100vh;
					margin-top: 45vh;
				}
			}
		</style>
	</head>
	<body>
		<p id="timer">80:000:00:00:00</p>
		<a href="countdown" id="final-form"></a>
		<script type="text/javascript">
			var timer = document.getElementById("timer");			
			var interval = setInterval(myTimer, 1000);
			var years = 80;
			var days = 0;
			var hours = 0;
			var minutes = 0;
			var seconds = 0;
			
			function myTimer() {
				if(--seconds < 0){
					if(--minutes < 0){
						if(--hours < 0){
							if(--days < 0){
								if(--years < 0){
									timer.style.display = "none";
									document.getElementById("final-form").style.display = "block";
									clearInterval(interval);
								}
								else{
									days = 364;
									hours = 23;
									minutes = 59;
									seconds = 59;
								}
							}
							else{
								hours = 23;
								minutes = 59;
								seconds = 59;
							}
						}
						else{
							minutes = 59;
							seconds = 59;
						}
					}
					else{
						seconds = 59;
					}
				}
				timer.innerHTML = `${years < 10 ? `0${years}` : years}:${days < 10 ? `00${days}` : (days < 100 ? `0${days}` : days)}:${hours < 10 ? `0${hours}` : hours}:${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds}` : seconds}`;
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>