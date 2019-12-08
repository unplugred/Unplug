<?php
$title = "greece";
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			body{
				display: flex;
			}

			img{
				width: 100vw;
				max-width: 154.17607223476297968397291196388vh;
			}

			.bg{
				display: inline-block;
				line-height: 0;
				margin: auto;
				position: relative;
			}

			#bg{
				display: block;
				width: 100vw;
				height: 100vh;
				background-image: url("<?php echo assets ?>/greece/greece.png");
				background-size: contain;
				background-position: center center;
				background-repeat: no-repeat;
			}

			#a{
				width: 30.5%;
				height: 77%;
				left: 62.85%;
				top: 21.3%;
				background-image: url("<?php echo assets ?>/greece/1.png");
			}

			#b{
				width: 30%;
				height: 62%;
				left: 10.45%;
				top: 17.7%;
				background-image: url("<?php echo assets ?>/greece/2.png");
			}

			#c{
				width: 24%;
				height: 47%;
				left: 33.5%;
				top: 45.4%;
				background-image: url("<?php echo assets ?>/greece/3.png");
			}

			#d{
				width: 26%;
				height: 46%;
				left: 42.2%;
				top: 46.2%;
				background-image: url("<?php echo assets ?>/greece/4.png");
			}

			#e{
				width: 13%;
				height: 35%;
				left: 50.4%;
				top: 26.05%;
				background-image: url("<?php echo assets ?>/greece/5.png");
			}

			#f{
				width: 10%;
				height: 57%;
				left: 59.65%;
				top: 26.1%;
				background-image: url("<?php echo assets ?>/greece/6.png");
			}

			#g{
				width: 11%;
				height: 31%;
				left: 33.9%;
				top: 26.9%;
				background-image: url("<?php echo assets ?>/greece/7.png");
			}

			#h{
				width: 6%;
				height: 13%;
				left: 43.15%;
				top: 27.5%;
				background-image: url("<?php echo assets ?>/greece/8.png");
			}

			.prsn{
				background-size: contain;
				background-repeat: no-repeat;
				position: absolute;
				opacity: 0;
			}

			.prsn:hover{
				opacity: 1;
			}

			.txt {
				pointer-events: none;
				color: black;
				position: absolute;
				text-align: center;
				font-weight: bold;
				width: 100vw;
				left: 0;
				font-family: arial,helvetica;
			}

			#text {
				top: 0;
				height: 100vh;
				line-height: 100vh;
				font-size: 25vmin;
			}

			#textt {
				top: calc(50vh + 10vmin);
				font-size: 5vmin;
			}
		</style>
	</head>
	<body>
		<div class="bg">
			<img src="<?php echo assets ?>/greece/greece.png"/>
			<div id="a" class="prsn" onmouseover="on('STEVE','*tries too hard')" onmouseout="off('STEVE')"></div>
			<div id="b" class="prsn" onmouseover="on('MARK','*he f_cks')" onmouseout="off('MARK')"></div>
			<div id="g" class="prsn" onmouseover="on('TOMMY','')" onmouseout="off('TOMMY')"></div>
			<div id="c" class="prsn" onmouseover="on('MIKE','*a junkie')" onmouseout="off('MIKE')"></div>
			<div id="e" class="prsn" onmouseover="on('JENNA','*a basic b_tch')" onmouseout="off('JENNA')"></div>
			<div id="d" class="prsn" onmouseover="on('DAVE','')" onmouseout="off('DAVE')"></div>
			<div id="f" class="prsn" onmouseover="on('LIZ','')" onmouseout="off('LIZ')"></div>
			<div id="h" class="prsn" onmouseover="on('CHRIS','')" onmouseout="off('CHRIS')"></div>
		</div>
		<div id="text" class="txt"></div>
		<div id="textt" class="txt"></div>
		<script>
			var txt = document.getElementById("text");
			var txttt = document.getElementById("textt");
			function on(txtt,txtttt){
				txt.innerHTML = txtt;
				txttt.innerHTML = txtttt;
			}
			function off(txtt){
				if(txt.innerHTML == txtt){
					txt.innerHTML = "";
					txttt.innerHTML = "";
				}
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>