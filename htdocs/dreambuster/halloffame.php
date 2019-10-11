<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Hall of Fame</title>

		<meta name="theme-color" content="#ffffff">
		<link rel="icon" type="image/png" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta name="dcterms.rightsHolder" content="Dream Buster">
		<meta property="og:site_name" content="Dream Buster">
		<meta name="twitter:site" content="Dream Buster">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="The Dream Buster Hall of Fame">
		<meta name="twitter:title" content="The Dream Buster Hall of Fame">
		<meta property="og:description" content="dumb shit mostly.">
		<meta name="twitter:description" content="dumb shit mostly.">
		<meta name="description" content="dumb shit mostly.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/ogjerry.png">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/ogjerry.png">

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<style>
			html, body{
				margin: 0;
				padding: 0;
				width: 100vw;
				height: 100vh;
				overflow-y: auto;
				overflow-x: hidden;
				line-height: 0;
				background-color: #fff;
				background-image: url("/bgjerry.png");
				background-position: center center;
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
				width: 8px;
			}

			*::-webkit-scrollbar-track {
				background-color: transparent;
			}

			*::-webkit-scrollbar-thumb {
				background-color: #000;
				outline: none;
				border-right: 3px solid white;
			}

			img{
				margin: 50px auto;
				display: block;
				border: 2px solid #aaa;
				max-width: 90%;
			}

			#title{
				border: none;
				margin: 150px auto;
			}
		</style>
	</head>
	<body>
		<img id="title" src="/hof.png"/>
		<script>
			for(i = 1; i <= <?php echo iterator_count(new FileSystemIterator("hof", FilesystemIterator::SKIP_DOTS)) ?>; i++)
			{
				var img = document.createElement("img");
				img.src = "/hof/" + i + ".png";
				document.body.appendChild(img);
			}
		</script>
	</body>
</html>
