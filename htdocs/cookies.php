<?php
$title = "cookies";
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<style>
			#nocookies{
				font-size: 150px;
				text-align: center;
				display: block;
				font-family: 'Times New Roman', serif;
				line-height: 1;
				margin-bottom: 20px;
				font-weight: bold;
			}
			#form{
				transition: margin-top 10s;
				max-width: 900px;
			}
			#accept{
				display: block;
				background-color: gray;
				color: black;
				margin: 0 auto;
				width: 159px;
				text-align: center;
				line-height: 40px;
				margin-bottom: 161px;
				text-decoration: none;
			}
			body{
				background-image: url("/assets/cookies.png");
				background-repeat: no-repeat;
				background-position: bottom center;
				display: flex;
				align-items: center;
				justify-content: center;
			}
			#cookieclick{
				display: block;
				width: 208px;
				height: 161px;
				position: absolute;
				bottom: 0;
				left: calc(50vw - 104px);
			}
		</style>
	</head>
	<body>
		<div id="form">
			<div id="nocookies">NO COOKIES</div>
			<a id="accept" href="javascript:void(0)" onclick="riseitup()">i accept.</a>
		</div>
		<a id="cookieclick" href="/nqiregvfrzrag"></a>
		<script>
			function riseitup(){
				document.getElementById("form").style.marginTop = "calc(-100vh - 100%)";
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>