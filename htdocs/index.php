<!DOCTYPE html>
<html>
	<head><!-----
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-52381925-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-52381925-3');
		</script>
		---->
		<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

		<meta name="theme-color" content="#4B7071">
		<link rel="icon" type="image/png" href="/assets/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">
		<title>red</title>

		<meta charset="utf-8">
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,redmakesstuff,redmakesart,redmakesgames,redmakesmusic">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="blog"/>
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="red"/>
		<meta name="twitter:title" content="red">
		<meta property="og:description" content="abstract thoughts of mine.">
		<meta name="twitter:description" content="abstract thoughts of mine.">
		<meta name="description" content="abstract thoughts of mine.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/anim.gif">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/anim.gif">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<link rel=StyleSheet href="/blog/blog.css" type="text/css" media=screen>

		<style>
			body, html{
				overflow-x: hidden;
			}

			#headerwrapper{
				display: flex;
			}

			#header{
				height: 136px;
				margin: 30px auto;
				display: flex;
				max-width: calc(100% - 20px);
			}
			
			#headerlinebreakthing{
				display: block;
				height: 20px;
			}

			#rotato-cubo{
			    height: 136px;
				width: 143px;
				background-image: url("/blog/red.gif");
				display: inline-block;
			}

			#separator{
			    height: 100%;
				width: 6px;
				border-radius: 3px;
				background-color: #D8E0E0;
				display: inline-block;
				margin: 0 30px;
			}

			#links{
				height: 100%;
			    display: inline-flex;
				flex-direction: column;
				justify-content: space-around;
				align-items: baseline;
				width: calc(100% - 209px);
			}

			.link{
				display: block;
			}

			.project{
				width: 100%;
				height: 250px;
				border-top: solid black 10px;
				background-attachment: fixed;
				background-position: center center;
				display: block;
			}

			.center{
				display: flex;
				justify-content: center;
				align-items: center;
			}

			#aircompressor{
				background-color: #808080;
				background-image: url("/img/aircompressor_bg.png");
				display: flex;
				justify-content: center;
				align-items: center;
			}

			#aircompressor-logo-wrapper{
				background-color: #FFF;
				border: 7px solid black;
				margin: 0 10px;
				max-width: calc(85% - 34px);
			}

			#aircompressor-logo{
				margin: 10px;
				display: block;
				max-width: calc(100% - 20px);
			}

			#headspace{
				background-color: #000;
				background-image: url("/img/headspace_bg.gif");
			}

			#headspace-logo{
				max-width: 80%;
			}

			#rooms-logo{
				max-width: 80%;
			}

			#rooms{
				background-color: #000;
				background-image: url("/img/rooms_bg.png");
			}

			#rooms-gradient{
				background: rgba(0,0,0,1);
				background: -moz-linear-gradient(-45deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
				background: -webkit-gradient(left top, right bottom, color-stop(0%, rgba(0,0,0,1)), color-stop(100%, rgba(0,0,0,0)));
				background: -webkit-linear-gradient(-45deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
				background: -o-linear-gradient(-45deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
				background: -ms-linear-gradient(-45deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0) 100%);
				background: linear-gradient(135deg, rgba(0,0,0,1) 0%, rgba(0,0,0,0.6) 100%);
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: baseline;
			}

			#rooms-mobile{
				display: none;
			}

			#unplug{
				background-color: #000;
				display: flex;
				flex-direction: column;
				justify-content: space-between;
				align-items: stretch;
			}

			#unplug-logo{
				max-width: 80%;
			}

			#unplug-bg{
				background-image: url("/img/unplug_bg.png");
				background-attachment: fixed;
				width: calc(100% - 20px);
				height: calc(100% - 20px);
				border: 10px solid black;
				background-size: cover;
				background-position: center center;
			}

			.unplug-horizontal{
				background-color: #000;
				display: flex;
				justify-content: space-between;
				align-items: stretch;
			}

			#unplug-top{
				background-image: url("/img/unplug-top.png");
				height: 22px;
			}

			#unplug-bottom{
				background-image: url("/img/unplug-bottom.png");
				height: 3px;
			}

			#unplug-middle{
				height: 100%;
			}

			#unplug-right{
				background-image: url("/img/unplug-right.png");
				width: 3px;
			}

			#unplug-left{
				background-image: url("/img/unplug-left.png");
				width: 3px;
			}

			#unplug-bottom-left{
				background-image: url("/img/unplug-bottom-left.png");
				height: 3px;
				width: 3px;
			}

			#unplug-top-left{
				background-image: url("/img/unplug-top-left.png");
				height: 22px;
				width: 100%;
				background-repeat: no-repeat;
			}

			#unplug-top-right{
				background-image: url("/img/unplug-top-right.png");
				height: 22px;
				width: 21px;
				float: right;
			}

			#unplug-bottom-right{
				background-image: url("/img/unplug-bottom-right.png");
				height: 3px;
				width: 3px;
			}

			#worseforthebetter{
				background-image: url("/img/worseforthebetter_bg.png");
				background-color: #808080;
			}

			#worseforthebetter-logo{
				background-image: url("/img/worseforthebetter_logo.png");
				background-position: center center;
				background-repeat: no-repeat;
				width: 100%;
				height: 100%;
			}

			#worseforthebetter-pill{
				background-image: url("/img/worseforthebetter_pill.png");
				background-position: left center;
				background-repeat: no-repeat;
				display: flex;
				width: 100%;
				height: 100%;
			}

			#uselessflower{
				background-color: #FFF;
				background-image: url("/img/uselessflower_bg.png");
				background-position: left top;
				background-attachment: inherit;
				background-repeat: no-repeat;
			}

			#uselessflower-logo{
				max-width: 80%;
			}

			#footer{
				width: 100%;
				height: 40px;
				display: block;
				border-top: solid black 10px;
			}

			#footer-text{
				text-align: center;
				margin: 0;
				margin-top: 10px;
			}

			@media only screen and (max-width: 485px) {
				body, html {
					overflow-y: visible;
				}

				#header{
					width: calc(100% - 20px);
					height: auto;
					flex-direction: column;
					align-items: center;
				}

				#separator{
					height: 6px;
					width: 100%;
					margin: 30px 0;
					display: block;
				}

				.icon{
					margin-left: 20px;
					margin-right: 0;
				}

				#links{
					height: auto;
					width: 100%;
				}
			}

			@media only screen and (max-width: 660px) {
				#worseforthebetter-pill{
					background-image: none;
				}

				#rooms-mobile{
					display: flex;
					width: 100%;
					height: 100%;
					background-image: url("/img/rooms_mobile.png");
					background-repeat: no-repeat;
					background-position: center top;
				}

				#rooms-text{
					width: 100%;
					height: 100%;
					background-image: url("/img/rooms_text.png");
					background-repeat: no-repeat;
					background-position: center center;
					background-size: contain;
					max-width: 457px;
				}

				#rooms-logo{
					display: none;
				}
			}
		</style>
	</head>
	<body
		><div id="headerwrapper"
			><div id="header"
				><a id="rotato-cubo" href="/unplug"></a
				><div id="separator"></div
				><div id="links"
					>Hi. im red. this site is mostly dedicated to my works.<div id="headerlinebreakthing"></div>
					<a class="link"" href="https://www.twitter.com/unplugred">Twitter</a
					><a class="link" href="https://unplugred.tumblr.com/">Angst automatism art blog</a
					><a class="link"" href="https://www.twitter.com/unplugred">Music</a
				></div
			></div
		></div
		><a href="https://unplugred.itch.io/air-compressor" class="project" id="aircompressor"
			><div id="aircompressor-logo-wrapper"
				><img src="/img/aircompressor_logo.png" id="aircompressor-logo"></img
			></div
		></div
		><a href="https://unplugred.itch.io/headspace" class="project center" id="headspace"
			><img id="headspace-logo" src="/img/headspace_logo.png"></img
		></a
		><a href="https://unplugred.itch.io/rooms" class="project" id="rooms"
			><div id="rooms-gradient"
				><img id="rooms-logo" src="/img/rooms_logo.png"></img
				><div class="center" id="rooms-mobile"
					><div id="rooms-text"></div
				></div
			></div
		></a
		><a href="/unplug" class="project" id="unplug"
			><div id="unplug-top"
				><div id="unplug-top-left"
					><div id="unplug-top-right"></div
				></div
			></div
			><div class="unplug-horizontal" id="unplug-middle"
				><div id="unplug-left"></div
					><div class="center" id="unplug-bg"
						><img id="unplug-logo" src="/img/unplug_logo.png"></img
					></div
				><div id="unplug-right"></div
			></div
			><div class="unplug-horizontal" id="unplug-bottom"
				><div id="unplug-bottom-left"></div
				><div id="unplug-bottom-right"></div
			></div
		></a
		><a href="https://unplugred.itch.io/worse-for-the-better" class="project" id="worseforthebetter"
			><div id="worseforthebetter-pill"
				><div id="worseforthebetter-logo"></div
			></div
		></a
		><a href="https://unplugred.itch.io/uselessflower" class="project center" id="uselessflower"
			><img id="uselessflower-logo" src="/img/uselessflower_logo.png"></img
		></a
		><div id="footer"
			><p id="footer-text">Copyright © Ari Hanan 2018-<?php echo date("Y"); ?></p
		></div
><?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
