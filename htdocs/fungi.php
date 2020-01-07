<?php
$title = "fungi";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			#main {
				margin: auto auto;
				display: inline-block;
				position: relative;
			}

			body {
				display: flex;
			}

			img {
				max-height: 100vh;
				max-width: 100vw;
			}

			.pctr {
				position: absolute;
				background-size: cover;
				background-position: center center;
				background-repeat: no-repeat;
				transition: opacity .1s;
				opacity: 0;
			}

			.pctr:hover {
				opacity: 1;
			}

			#n1 {
				background-image:url("<?php echo assets ?>/fungi/1.png");
				top: 34%;
				left: 76.1%;
				width: 5.32%;
				height: 13.7%;
			}
			
			#n2 {
				background-image:url("<?php echo assets ?>/fungi/2.png");
				left: 38.4%;
				top: 20.915%;
				width: 21.18%;
				height: 24.9%;
			}
			
			#n3 {
				background-image:url("<?php echo assets ?>/fungi/3.png");
				left: 20.5%;
				top: 47%;
				width: 7.9%;
				height: 7.4%;
			}
			
			#n4 {
				background-image:url("<?php echo assets ?>/fungi/4.png");
				left: 10.3%;
				top: 17.5%;
				width: 13.9%;
				height: 18.5%;
			}
		</style>
	</header>
	<body>
		<div id="main">
			<img src="<?php echo assets ?>/fungi/fungi.png"/>
			<a class="pctr" href="/cookies" id="n1"></a>
			<a class="pctr" href="/time" id="n2"></a>
			<a class="pctr" href="/meta" id="n3"></a>
			<a class="pctr" href="/weeeee" id="n4"></a>
		</div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>