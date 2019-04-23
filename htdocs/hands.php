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
			}
			#hand5:hover {
				background-image: url("/assets/hands/5h.png");
			}

			.center {
				width: 1px;
				height: 1px;
				background-color: red;
			}
		</style>
	</head>
	<body>
		<a id="hand1" class="hand" href="/glow" style="transform: rotate(166.631deg)"><div class="center"></div></a>
		<a id="hand2" class="hand" href="/snow" style="transform: rotate(-174.517deg)"><div class="center"></div></a>
		<a id="hand3" class="hand" href="/lion" style="transform: rotate(160.276deg)"><div class="center"></div></a>
		<a id="hand4" class="hand" href="/fuck" style="transform: rotate(-22.9963deg)"><div class="center"></div></a>
		<a id="hand5" class="hand" href="/square" style="transform: rotate(2.6822deg)"><div class="center"></div></a>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
		<script>
			document.addEventListener('mousemove', evt => {
			    let x = evt.clientX;
			    let y = evt.clientY;
			    
			    $('.center').each(function(i, obj) {
			    	var offset = $(this).offset();
					$(this).parent().css("transform", "rotate(" + (180*Math.atan2(y - offset.top, x - offset.left)/Math.PI) + "deg)");
				});
			});
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>