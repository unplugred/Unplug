<?php
$color = "#F4F4F4";
$title = "hands";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			body{
				background-color: #F4F4F4;
				background-image: url("/assets/hands/bg.png");
				background-repeat: repeat;
			}

			.hand {
				display: block;
				position: absolute;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			#hand1 {
				top: calc(43vh - 80px);
				left: calc(64vw - 151px);
				width: 199px;
				height: 90px;
				background-image: url("/assets/hands/1.png");
				transform: rotate(166.631deg);
			}
			#hand1:hover {
				background-image: url("/assets/hands/1h.png");
			}

			#hand2 {
				top: calc(79vh - 75px);
				left: calc(83vw - 153px);
				width: 201px;
				height: 86px;
				background-image: url("/assets/hands/2.png");
				transform: rotate(-174.517deg);
			}
			#hand2:hover {
				background-image: url("/assets/hands/2h.png");
			}

			#hand3 {
				top: calc(20vh - 98px);
				left: calc(80vw - 149px);
				width: 202px;
				height: 82px;
				background-image: url("/assets/hands/3.png");
				transform: rotate(160.276deg);
			}
			#hand3:hover {
				background-image: url("/assets/hands/3h.png");
			}

			#hand4 {
				top: calc(90vh - 126px);
				left: calc(40vw - 202px);
				width: 328px;
				height: 167px;
				background-image: url("/assets/hands/4.png");
				transform: rotate(-22.9963deg);
			}
			#hand4:hover {
				background-image: url("/assets/hands/4h.png");
			}

			#hand5 {
				top: calc(40vh - 147px);
				left: calc(20vw - 221px);
				width: 331px;
				height: 179px;
				background-image: url("/assets/hands/5.png");
				transform: rotate(2.6822deg);
			}
			#hand5:hover {
				background-image: url("/assets/hands/5h.png");
			}

			@media screen and (orientation: portrait) {
				#hand1 {
					top: calc(36vh - 80px);
					left: calc(43vw - 151px);
					transform: rotate(76.631deg);
				}

				#hand2 {
					top: calc(17vh - 75px);
					left: calc(79vw - 153px);
					transform: rotate(95.483deg);
				}

				#hand3 {
					top: calc(20vh - 98px);
					left: calc(20vw - 149px);
					transform: rotate(70.276deg);
				}

				#hand4 {
					top: calc(60vh - 126px);
					left: calc(90vw - 202px);
					transform: rotate(247.0037deg);
				}

				#hand5 {
					top: calc(80vh - 147px);
					left: calc(40vw - 221px);
					transform: rotate(272.6822deg);
				}
			}

			.center {
				width: 1px;
				height: 1px;
				background-color: red;
			}
		</style>
	</head>
	<body>
		<a id="hand5" class="hand" href="/square" title="tinker"><div class="center"></div></a>
		<a id="hand4" class="hand" href="/fuck" title="tailor"><div class="center"></div></a>
		<a id="hand3" class="hand" href="/lion" title="sinker"><div class="center"></div></a>
		<a id="hand1" class="hand" href="/glow" title="sailor"><div class="center"></div></a>
		<a id="hand2" class="hand" href="/snow" title="thief"><div class="center"></div></a>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script>
			var cursorX,cursorY;
			document.onmousemove = function(e){
				cursorX = e.pageX;
				cursorY = e.pageY;
			}

			setInterval(timer, 20);
			function timer(){
				$('.center').each(function(i, obj) {
					let offset = $(this).offset();
					let hand = $(this).parent();
					let values = hand.css("transform").split('(')[1].split(')')[0].split(',');
					let currentrot = Math.atan2(values[1], values[0]) * (180/Math.PI);
					let targetrot = 0;
					if(hand.is(":hover"))
						targetrot = currentrot + 4;
					else
						targetrot = 180 * Math.atan2(cursorY - offset.top, cursorX - offset.left) / Math.PI;
					hand.css("transform", "rotate(" + lerp360(currentrot, targetrot, .8) + "deg)");
				});
			}
			function lerp360(a,b,c){
				if(Math.abs(b - a) > Math.abs(b - (a - 360)))
					a -= 360;
				if(Math.abs(a - b) > Math.abs(a - (b - 360)))
					b -= 360;

				return (a * c) + (b * (1 - c));
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>