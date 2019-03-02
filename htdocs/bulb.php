<?php
$color = "#000000";
$title = "bulb";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			.mainimage {
				margin-top: calc(50vh - 270px);
				margin-left: calc(50vw - 200px);
				display: block;
				max-width:400px;
				text-align: center;
			}

			.num {
				display: block;
				margin: 0 auto;
			}
			
			.hov {
				display: block;
				width: 100%;
				height: 100%;
				opacity: 0;
			}
			
			.hov:hover {
				opacity: 1;
			}
			
			.one {
				width: 33px;
				height: 66px;
				background-image: url("/assets/bulb/1r.png");
			}

			.oneh {
				background-image: url("/assets/bulb/1g.png");
			}

			.two {
				width: 44px;
				height: 66px;
				background-image: url("/assets/bulb/2r.png");
			}

			.twoh {
				background-image: url("/assets/bulb/2g.png");
			}

			.three {
				width: 42px;
				height: 67px;
				background-image: url("/assets/bulb/3r.png");
			}

			.threeh {
				background-image: url("/assets/bulb/3g.png");
			}

			.button{
				width:13px;
				height:13px;
				background-image:url("/assets/bulb/crcl.png");
				display: block;
				margin: 0 auto;
			}
		</style>
	</head>
	<body>
		<div class="mainimage">
			....i need to replace the bulb
			<br/>
			<br/>
			<div class="two num"><a class="twoh hov" href="/who"></a></div>
			moving
			<br/>
			<br/>
			<div class="three num"><a class="threeh hov" href="/frogs"></a></div>
			all over again
			<br/>
			<br/>
			<div class="one num"><a class="oneh hov" href="/bus"></a></div>
			thats me
			<br/>
			<br/>
			<br/>
			<br/>
			<a href="/reality">
				<div class="button"></div>
				you know youre my favorite flower on the wall
			</a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>