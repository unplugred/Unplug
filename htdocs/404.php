<!DOCTYPE html>
<html lang="en">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/tracking.php'; ?>

		<meta name="theme-color" content="#000000">
		<link rel="icon" type="image/png" href="/assets/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">
		<title>404</title>

		<meta charset="utf-8">
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,404,not found">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article"/>
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="404"/>
		<meta name="twitter:title" content="404">
		<meta property="og:description" content="you got lost.">
		<meta name="twitter:description" content="you got lost.">
		<meta name="description" content="you got lost.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/h.gif">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/h.gif">

		<link rel=StyleSheet href="/assets/unplug.css" type="text/css" media=screen>

		<style>
			.mainimage {
				width: 702px;
				height: 236px;
				background-size: contain;
				background-image: url("/assets/404.gif");
				background-repeat: no-repeat;
				background-position: center;
				margin-top: 15px;
			}

			.bodytext{
				margin: 20px;
			}

			b{
				color:white;
			}

			.mainthing{
				border: 5px #999 solid;
				width: 702px;
				margin-top: calc(35vh - 192px);
				margin-left: calc(50vw - 351px);
				position: absolute;
			}

			.santa{
				width: 100px;
				height: 100px;
				background-image: url("/assets/h.gif");
				position: absolute;
				margin-top: calc(105vh - 170px);
				margin-left: calc(100vw - 120px);
			}
		</style>
	</head>
	<body>
		<div class="mainthing">
			<div class="mainimage" title="404"></div>

			<div class="bodytext">
				<b>you got lost.</b>
				<br/>
				<br/>
				<a href="/">click here</a> to get back.
			</div>
		</div>
		<a href="/santa" class="santa"></a>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>