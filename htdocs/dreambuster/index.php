<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Dream Buster</title>

		<meta name="theme-color" content="#ffffff">
		<link rel="icon" type="image/png" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta name="dcterms.rightsHolder" content="Dream Buster">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary_large_image">
		<meta property="og:title" content="Dream Buster">
		<meta name="twitter:title" content="Dream Buster">
		<meta property="og:description" content="Porting games from alternative dimensions since 372X.">
		<meta name="twitter:description" content="Porting games from alternative dimensions since 372X.">
		<meta name="description" content="Porting games from alternative dimensions since 372X.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/og.png">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/og.png">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-----------MESSAGE TO ALL READERS-----------
			I want to sincerely apologize for my awful use of flexboxes in this CSS code.
			thank you for your time -->
		<style>
			html, body{
				margin: 0;
				padding: 0;
				width: 100vw;
				height: 100vh;
				overflow-y: auto;
				overflow-x: hidden;
				font-family: 'Libre Baskerville', sans-serif;
				line-height: 1.5;
				background-color: #000027;
				interpolation-mode: nearest-neighbor;
				-ms-interpolation-mode: nearest-neighbor;
				image-rendering: -webkit-optimize-contrast;
				image-rendering: -webkit-crisp-edges;
				image-rendering: -moz-crisp-edges;
				image-rendering: -o-crisp-edges;
				image-rendering: pixelated;
			}

			::selection {
				color: #333;
				background: #999999fe;
			}

			::-moz-selection {
				color: #333;
				background: #999999fe;
			}

			*::-webkit-scrollbar {
				width: 7px;
			}

			*::-webkit-scrollbar-track {
				background-color: white;
			}

			*::-webkit-scrollbar-thumb {
				background-color: #777;
				outline: none;
			}

			#bigtitle{
				width: 310px;
				height: calc(100% - 40px);
				padding: 20px;
				overflow-y: auto;
				box-shadow: 0 0 20px 0 rgba(0,0,0,0.25);
				background-color: #fff;
				position: fixed;
				z-index: 1000;
			}

			#logo{
				margin: 10px auto 0 calc(50% - 102px);
			}

			#jerry{
				margin: 10px auto 0 calc(50% - 29px);
			}

			#games{
				margin-left: 350px;
			}

			a{
				color: #000;
				font-weight: bold;
			}

			#footer{
				color: white;
				font-weight: bold;
				text-align: center;
				opacity: .5;
			}

			.gaem{
				height: 275px;
				display: flex;
				align-items: center;
				padding-bottom: 70px;
			}

			.logo{
				margin: auto;
				display: flex;
				line-height: 0;
				border: 20px solid transparent;
			}

			.logo img{
				max-width: 100%;
				margin: auto;
			}

			.graphic{
				flex: 2 0 275px;
				display: flex;
			}

			.sidebar{
				flex: 0 0 331px;
			}

			iframe{
				width: calc(100% - 10px);
				height: 171px;
				box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.25);
				background-color: black;
			}

			#bmcp{
				background-image: url(/bmcp/end.png);
				background-repeat: repeat-x;
				background-position: bottom left;
				position: relative;
				margin-top: -167px;
			}

			#bmcpbgbs{
				height: 167px;
				width: 100%;
				background-image: url(/bmcp/bg.png);
				background-repeat: repeat;
				background-position: bottom left;
			}

			#aoj{
				background-image: url(/aoj/bg.png), linear-gradient(to bottom, #710032 90%, #FF5C66 90%);
				background-repeat: repeat, no-repeat;
				background-position: bottom center;
				margin-top: -100px;
				padding-top: 100px;
			}

			#cdrxiv{
				background-image: url(/cdrxiv/sun.png), url(/cdrxiv/bg.png), linear-gradient(to bottom, #FF5C66 95%, #000027 95%);
				background-repeat: no-repeat, repeat-x, no-repeat;
				background-position: bottom left;
			}

			#slogan{
				font-style: italic;
				text-align: center;
			}

			@media only screen and (max-width: 1000px) {
				#bigtitle{
					width: auto;
					height: auto;
					overflow-y: initial;
					position: relative;
				}

				#games{
					margin-left: 0;
				}

				@media only screen and (max-width: 750px) {
					.gaem{
						display: block;
						padding: 20px;
						height: 475px;
					}

					.logo{
						height: 185px;
					}

					#bmcp{
						margin-top: -367px;
					}

					#bmcpbgbs{
						height: 367px;
					}

					iframe{
						height: 200px;
					}

					.logo img {
						max-height: 90%;
						margin: auto;
					}
				}
			}
		</style>

		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Libre%20Baskerville%3A400%2C400italic%2C700%2C700italic" type="text/css"/>
	</head>
	<body>
		<div id="bigtitle">
			<img src="/logo.png" id="logo"/>
			<p id="slogan">Porting games from alternative dimensions since 372X.</p>
			<p>We are a group of bored individuals who participate in Ludum Dare because we want to.</p>
			<p>Theres <a href="https://soundcloud.com/the_real_astrodex/">Astro</a> and <a href="https://laulaulau.bandcamp.com">Lau</a> working on the music (lau also does the trailers), <a href="https://twitter.com/James9270Dev">James</a> doing some code magic, <a href="https://twitter.com/Noogai223">Noogai</a> on the sprites, <a href="https://unplug.red/">Red</a> doing 3D models and shaders, and <a href="https://twitter.com/Rjwest071">RJ</a> being the team mascot 🎉</p>
			<p>You can check out all of our games in our <a href="https://dreambuster.itch.io/">itch.io page</a>, and trailers on our <a href="https://www.youtube.com/channel/UCr70fbLAXeL38wgUol6sGPQ">youtube account</a>.</p>
			<p>you are also invited to check out the <a href="/halloffame">Dream Buster Hall of Fame</a> for random stuff we send on discord</p>
			<img src="/jerry.png" id="jerry"/>
		</div>
		<div id="games">
			<div id="bmcpbgbs"></div>
			<div id="bmcp" class="gaem">
				<div class="graphic">
					<a href="https://dreambuster.itch.io/bmcp" class="logo"><img src="/bmcp/logo.png"/></a>
				</div>
				<div class="sidebar">
					<iframe src="https://www.youtube.com/embed/ypznQaU9SH8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div id="aoj" class="gaem">
				<div class="graphic">
					<a href="https://dreambuster.itch.io/attack-on-jerry" class="logo"><img src="/aoj/logo.png"/></a>
				</div>
				<div class="sidebar">
					<iframe src="https://www.youtube.com/embed/TwTBj7tcUSc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div id="cdrxiv" class="gaem">
				<div class="graphic">
					<a href="https://dreambuster.itch.io/car-destruction-racer-xiv" class="logo"><img src="/cdrxiv/logo.png"/></a>
				</div>
				<div class="sidebar">
					<iframe src="https://www.youtube.com/embed/jazxOs4PkqY" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<p id="footer">All rights reserved or smth idk. privacy policy: none we dont track anything<br/>Jerry loves you all</p>
		</div>
	</body>
</html>
